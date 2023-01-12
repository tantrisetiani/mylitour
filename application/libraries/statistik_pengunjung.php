<?php
/* @package   OpenSID
 * @author    Tim Pengembang OpenDesa
 * @copyright Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * @copyright Hak Cipta 2016 - 2022 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 * @license   http://www.gnu.org/licenses/gpl.html GPL V3
 * @link      https://github.com/OpenSID/OpenSID
 *
 */
defined('BASEPATH') or exit('No direct script access allowed');
class statistik_pengunjung
{
    /**
     * Intance class codeigniter.
     *
     * @var CI_Controller
     */
    protected $ci;

    /**
     * Table sys_traffic
     *
     * @var string
     */
    protected $table = 'statistik_pengunjung';

    /**
     * Constructor statistik pengunjung.
     *
     * @return void
     */
    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->library('user_agent');
    }

    /**
     * Counter pengunjung visitor.
     *
     * @return void
     */
    public function counter_visitor()
    {
        if (isset($this->ci->session->pengunjungOnline)) {
            return;
        }

        if (null === ($visitor = $this->get_pengunjung_hari_ini())) {
            $this->insert_visitor();
        } else {
            $this->increment_visitor((int) $visitor->jumlah, $visitor->ipAddress);
        }

        $this->ci->session->set_userdata('pengunjungOnline', date('Y-m-d'));
    }

    /**
     * Sistem operasi pengunjung.
     *
     * @return string
     */
    public function os()
    {
        return $this->ci->agent->platform();
    }

    /**
     * IP Address pengunjung.
     *
     * @return string
     */
    public function ip_address()
    {
        return $this->ci->input->ip_address();
    }

    /**
     * Browser pengunjung.
     *
     * @return string
     */
    public function browser()
    {
        if ($this->ci->agent->is_browser()) {
            $browser = $this->ci->agent->browser() . ' ' . $this->ci->agent->version();
        } elseif ($this->ci->agent->is_robot()) {
            $browser = $this->ci->agent->robot();
        } elseif ($this->ci->agent->is_mobile()) {
            $browser = $this->ci->agent->mobile();
        } else {
            $browser = 'Tidak ditemukan';
        }

        return $browser;
    }

    /**
     * Data mixed jumlah statitik pengunjung.
     *
     * @param int|null
     * @param mixed $type
     *
     * @return mixed
     */
    public function get_pengunjung($type)
    {
        $tgl = date('Y-m-d');
        $bln = date('m');
        $thn = date('Y');

        $this->ci->db->select_sum('jumlah');

        switch ($type) {
                // Hari Ini
            case 1:
                $this->ci->db->select('tanggal');
                $this->kondisi($type);
                $this->ci->db->group_by('tanggal');

                $data['lblx']  = 'Tanggal';
                $data['judul'] = 'Hari Ini ( ' . tgl_indo2($tgl) . ')';
                break;
                // Kemarin
            case 2:
                $this->ci->db->select('tanggal');
                $this->kondisi($type);
                $this->ci->db->group_by('tanggal');

                $data['lblx']  = 'Tanggal';
                $data['judul'] = 'Kemarin ( ' . tgl_indo2($this->op_tgl('-1 days', $tgl)) . ')';
                break;
                // 7 Hari (Minggu Ini)
            case 3:
                $this->ci->db->select('tanggal');
                $this->kondisi($type);
                $this->ci->db->group_by('tanggal');

                $data['lblx']  = 'Tanggal';
                $data['judul'] = 'Dari Tanggal ' . tgl_indo2($this->op_tgl('-6 days', $tgl)) . ' - ' . tgl_indo2($tgl);
                break;
                // 1 bulan(tgl 1 sampai akhir bulan)
            case 4:
                $this->ci->db->select('tanggal');
                $this->kondisi($type);
                $this->ci->db->group_by('tanggal');

                $data['lblx']  = 'Tanggal';
                $data['judul'] = 'Bulan ' . ucwords(getBulan($bln)) . ' ' . $thn;
                break;
                // 1 tahun / 12 Bulan
            case 5:
                $this->ci->db->select('MONTH(`tanggal`) AS tanggal');
                $this->kondisi($type);
                $this->ci->db->group_by('MONTH(`tanggal`)');

                $data['lblx']  = 'Bulan';
                $data['judul'] = 'Tahun ' . $thn;
                break;
                // Semua Data
            default:
                $this->ci->db->select('YEAR(`tanggal`) AS tanggal');
                $this->ci->db->group_by('YEAR(`tanggal`)');

                $data['lblx']  = 'Tahun';
                $data['judul'] = 'Setiap Tahun';
                break;
        }

        $this->ci->db->order_by('tanggal', 'asc');
        $pengunjung         = $this->ci->db->get($this->table)->result_array();
        $data['dashboard'] = $pengunjung;

        $jml = 0;

        foreach ($pengunjung as $total) {
            $jml += $total['jumlah'];
        }

        $data['total'] = $jml;

        return $data;
    }

    /**
     * Get pengungunjung hari ini.
     *
     * @return object
     */
    public function get_pengunjung_hari_ini()
    {
        return $this->ci->db->where('tanggal', date('Y-m-d'))->get($this->table)->row();
    }

    /**
     * Get pengunjung kemarin
     *
     * @return object
     */
    public function get_pengunjung_kemarin()
    {
        return $this->get_pengunjung_total(2);
    }

    /**
     * Total pengunjung total jumlah.
     *
     * @param int|null
     * @param mixed|null $type
     *
     * @return object
     */
    public function get_pengunjung_total($type = null)
    {
        $this->ci->db->select_sum('jumlah');
        $this->kondisi($type);

        return $this->ci->db->get($this->table)->row()->jumlah;
    }

    /**
     * Insert visitor hari ini
     *
     * @return void
     */
    public function insert_visitor()
    {
        return $this->ci->db->insert($this->table, [
            'tanggal'   => date('Y-m-d'),
            'ipAddress' => json_encode(['ip_address' => [$this->ip_address()]]),
            'jumlah'    => 1,
        ]);
    }

    /**
     * Increment visitor hari ini.
     *
     * @param int jumlah
     * @param json $lastIpAddress
     *
     * @return void
     */
    public function increment_visitor(int $jumlah, $lastIpAddress)
    {
        $ip_address = json_decode($lastIpAddress, true);

        return $this->ci->db->where('tanggal', date('Y-m-d'))
            ->update($this->table, [
                'ipAddress' => json_encode(['ip_address' => array_merge([$this->ip_address()], $ip_address['ip_address'])]),
                'jumlah'    => $jumlah + 1,
            ]);
    }

    /**
     * Get statistik pengunjung.
     *
     * @return array
     */
    public function get_statistik()
    {
        return [
            'hari_ini'   => $this->get_pengunjung_hari_ini()->jumlah,
            'kemarin'    => $this->get_pengunjung_kemarin(),
            'total'      => $this->get_pengunjung_total(),
            'os'         => $this->os(),
            'ip_address' => $this->ip_address(),
            'browser'    => $this->browser(),
        ];
    }

    /**
     * Where clause kondisi tanggal.
     *
     * @param int|null $type
     *
     * @return void
     */
    protected function kondisi($type)
    {
        $tgl = date('Y-m-d');
        $bln = date('m');
        $thn = date('Y');

        switch ($type) {
                // Hari ini
            case 1:
                $this->ci->db->where('tanggal', $tgl);
                break;
                // Kemarin
            case 2:
                $this->ci->db->where('tanggal', $this->op_tgl('-1 days', $tgl));
                break;
                // Minggu ini
            case 3:
                $this->ci->db->where([
                    'tanggal >=' => $this->op_tgl('-6 days', $tgl),
                    'tanggal <=' => $tgl,
                ]);
                break;
                // Bulan ini
            case 4:
                $this->ci->db->where([
                    'MONTH(`tanggal`) = ' => $bln,
                    'YEAR(`tanggal`)  = ' => $thn,
                ]);
                break;
                // Tahun ini
            case 5:
                $this->ci->db->where('YEAR(tanggal) =', $thn);
                break;
                // Semua jumlah pengunjung
            default:
                break;
        }
    }

    /**
     * Rentang tanggal.
     *
     * @return string
     */
    protected function op_tgl(string $op, string $tgl)
    {
        return date('Y-m-d', strtotime($op, strtotime($tgl)));
    }
}
