<div id="addModal" class="modal" style="display: none;">
   <div class="container-modal">
       <div class="modal-content">
           <div class="d-flex justify-content-end">
               <span class="close-btn" id="closeAddModal">&times;</span>
           </div>
           <h3 class="text-center font-24 mb-3"><?= $modalTitleAdd ?></h3>
           <form id="addForm" action="<?= $addAction ?>" method="post" class="needs-validation" novalidate>
               <div class="form-group">
                   <label for="name"><?= $nameLabel ?></label>
                   <input type="text" id="name" name="name" class="form-control" required>
                   <div class="invalid-feedback">Please enter a valid name.</div>
               </div>
               <div class="form-group">
                   <label for="code"><?= $codeLabel ?></label>
                   <input type="text" id="code" name="code" class="form-control" required>
                   <div class="invalid-feedback">Please enter a valid code.</div>
               </div>
               <div class="d-flex justify-content-end">
                   <button type="submit" class="btn btn-primary"><?= $addButtonText ?></button>
               </div>
           </form>
       </div>
   </div>
</div>
