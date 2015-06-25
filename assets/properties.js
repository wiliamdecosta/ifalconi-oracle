var properties = {
    info:{},
    service: {}
};

properties.info.all = "Semua";
properties.info.noresults = "Data tidak ditemukan";
properties.info.datainfo = "Menampilkan {{ctx.start}} s.d {{ctx.end}} dari {{ctx.total}} data";
properties.info.search = "Cari...";
properties.info.loading = '<img src="../assets/images/beauty-spinner-small.gif"/>';
properties.info.progressbar = '<div class="progress progress-striped active"> <div id="loading-progress" class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100" style="width:100%"> <span id="loading-progress-text" class="progress-completed" style="font-weight:bold;">Please Wait....</span></div></div>';

properties.service.ws_url = "http://localhost/ifalconi/payment_wscontroller/";