<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/kabmadiun.png" />
    <title><?= $potensi360->nama_potensi ?></title>
    <meta content="<?= $potensi360->nama_potensi ?>" name="description">

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>pengunjung/vendor/bootstrap4/css/bootstrap.min.css">
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.slim.min.js"></script>
    <script src="<?= base_url('assets/'); ?>pengunjung/vendor/bootstrap4/js/bootstrap.bundle.min.js"></script>
    <style>
        html,
        body {
            margin: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background-color: #000;
        }

        #container {
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body class="modal-open">
    <div id="container"></div>
    <div class="modal fade" id="detailPotensi" tabindex="-1" aria-labelledby="detailPotensi">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5"><?= $potensi360->nama_potensi ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <p><?= $potensi360->informasi ?></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col text-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="<?= base_url('assets/'); ?>potensi/js/three.min.js "></script>
<script src="<?= base_url('assets/'); ?>potensi/js/panolens.min.js"></script>

<script>
    var panorama, viewer, container, infospot;

    container = document.querySelector('#container');
    panorama = new PANOLENS.ImagePanorama("<?= base_url(''); ?>assets/img/potensi/<?= $potensi360->foto_potensi; ?>");
    infospot = new PANOLENS.Infospot(350, PANOLENS.DataImage.Info);
    infospot.position.set(-5000.00, 0, -5000);
    infospot.addEventListener("click", function() {
        $("#detailPotensi").modal("show");
    });
    panorama.add(infospot);

    viewer = new PANOLENS.Viewer({
        cameraFov: 80,
        autoHideInfospot: false,
        controlBar: true,
        controlButtons: [],
        container: container,
        autoRotate: true,
        autoRotateSpeed: 0.5,
        autoRotateActivationDuration: 10000,
        dwellTime: 2500,
        enableReticle: false
    });
    viewer.add(panorama);
    viewer.addUpdateCallback();
    viewer.OrbitControls.minFov = 30;
    viewer.OrbitControls.maxFov = 120;
    viewer.OrbitControls.noZoom = false;

    var ButtonZoomIn = {
        style: {
            backgroundImage: 'url(<?= base_url('assets/'); ?>potensi/img/plus.png)'
        },
        onTap: function() {
            zoomIn();
        }
    };
    var ButtonZoomOut = {
        style: {
            backgroundImage: 'url(<?= base_url('assets/'); ?>potensi/img/minus.png)'
        },
        onTap: function() {
            zoomOut();
        }
    };
    var ButtonLeft = {
        style: {
            backgroundImage: 'url(<?= base_url('assets/'); ?>potensi/img/right.png)'
        },
        onTap: function() {
            RotateLeftRigth(0, 1);
        }
    };
    var ButtonRight = {
        style: {
            backgroundImage: 'url(<?= base_url('assets/'); ?>potensi/img/left.png)'
        },
        onTap: function() {
            RotateLeftRigth(1, 0);
        }
    };
    var ButtonUp = {
        style: {
            backgroundImage: 'url(<?= base_url('assets/'); ?>potensi/img/up.png)'
        },
        onTap: function() {
            rotateUpDown(1, 0);
        }
    };
    var ButtonDown = {
        style: {
            backgroundImage: 'url(<?= base_url('assets/'); ?>potensi/img/down.png)'
        },
        onTap: function() {
            rotateUpDown(0, 1);
        }
    };

    viewer.appendControlItem(ButtonRight);
    viewer.appendControlItem(ButtonLeft);
    viewer.appendControlItem(ButtonDown);
    viewer.appendControlItem(ButtonUp);
    viewer.appendControlItem(ButtonZoomOut);
    viewer.appendControlItem(ButtonZoomIn);

    function zoomIn() {
        var currentZoom = viewer.camera.fov;
        var newZoom = currentZoom - 5;
        if (newZoom < viewer.OrbitControls.minFov) newZoom = viewer.OrbitControls.minFov;
        viewer.setCameraFov(newZoom);
    }

    function zoomOut() {
        var currentZoom = viewer.camera.fov;
        var newZoom = currentZoom + 5;
        if (newZoom > viewer.OrbitControls.maxFov) newZoom = viewer.OrbitControls.maxFov;
        viewer.setCameraFov(newZoom);
    }
    var ROTATION_POSITION = 0.050;
    var ROTATION_SPEED = 150;

    function RotateLeftRigth(param) {
        let go = ROTATION_POSITION;
        let back = -ROTATION_POSITION;
        let pos = param < 1 ? go : back;
        let easing = {
            val: pos
        };
        let tween = new TWEEN.Tween(easing)
            .to({
                val: 0
            }, ROTATION_SPEED)
            .easing(TWEEN.Easing.Quadratic.InOut)
            .onUpdate(function() {
                viewer.OrbitControls.rotateLeft(easing.val)
            }).start();
    }

    function rotateUpDown(param) {
        let go = ROTATION_POSITION;
        let back = -ROTATION_POSITION;
        let pos = param < 1 ? go : back;
        let easing = {
            val: pos
        };
        let tween = new TWEEN.Tween(easing)
            .to({
                val: 0
            }, ROTATION_SPEED)
            .easing(TWEEN.Easing.Quadratic.InOut)
            .onUpdate(function() {
                viewer.OrbitControls.rotateUp(easing.val)
            }).start();
    }
</script>


</html>
<?php
/* @package   DISPUSIP VIRTUAL
 * @author    Tim Pengembang DISPUSIP VIRTUAL
 * @copyright Hak Cipta https://dispusip.surabaya.go.id/virtual/
 * @license   https://dispusip.surabaya.go.id/virtual/
 * @link      https://dispusip.surabaya.go.id/virtual/
 *
 */
?>