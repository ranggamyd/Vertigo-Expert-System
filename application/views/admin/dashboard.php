<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="text-black">Dashboard</h1>
</div>
<div class="section-body">
   <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col">
                     <div class="text-xs font-weight-bold text-gray text-uppercase mb-1">
                        <h4><i class="fa fa-plus" style="color:blue"></i> Kategori Penyakit</h4>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kategori ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-gray text-uppercase mb-1">
                        <h4><i class="fas fa-medkit" style="color:red"></i> Total Penyakit</h4>
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $penyakit ?> </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col">
                     <div class="text-xs font-weight-bold text-gray text-uppercase mb-1">
                        <h4><i class="fa fa-plus" style="color:blue"></i> Total Gejala</h4>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $gejala ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-gray text-uppercase mb-1">
                        <h4><i class="fas fa-users" style="color:warning"></i> Diagnosa</h4>
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $diagnosa ?></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>