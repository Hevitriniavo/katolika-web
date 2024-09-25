<div id="editCommitteeModal" class="modal" style="display: none;">
   <div class="container-modal">
       <div class="modal-content">
    <div class="d-flex justify-content-end">
        <span class="close-btn" id="closeEditCommitteeModal">&times;</span>
    </div>
           <h3 class="text-center font-24"><?= $modalTitleEdit ?></h3>
           <form id="editForm" action="<?= $editAction ?>" method="post" class="needs-validation" novalidate>
               <input type="hidden" id="editId" name="id">

               <div class="form-group">
                   <label for="editName"><?= $nameLabel ?></label>
                   <input type="text" id="editName" name="name" class="form-control" required>
                   <div class="invalid-feedback">Please enter a valid name.</div>
               </div>

               <div class="form-group">
                   <label for="editCode"><?= $codeLabel ?></label>
                   <input type="text" id="editCode" name="code" class="form-control" required>
                   <div class="invalid-feedback">Please enter a valid code.</div>
               </div>
              <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary"><?= $updateButtonText ?></button>
              </div>
           </form>
       </div>
   </div>
</div>
