function message() {
    var NamaPengunjung = document.getElementById("nama_pengunjung");
    var Email = document.getElementById("email_pengunjung");
    var Pesan = document.getElementById("kritik_saran");
    const success = document.getElementById("success");
    const danger = document.getElementById("danger");

    if (NamaPengunjung.value === "" || Email.value === "" || Pesan.value === "") {
        danger.style.display = "block";
    } else {
        setTimeout(() => {
            NamaPengunjung.value = "";
            Email.value = "";
            Pesan.value = "";
        }, 2000);
        success.style.display = "block";
    }

    setTimeout(() => {
        danger.style.display = "none";
        success.style.display = "none";
    }, 4000);
}