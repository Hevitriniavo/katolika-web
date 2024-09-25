<div id="deleteModal" class="modal">
   <div class="container-modal">
       <div class="modal-content">
          <div class="text-center d-flex justify-content-end">
              <span class="close-btn" id="closeDeleteModal">&times;</span>
          </div>
           <h3 class="text-center font-22 mb-3">Confirm Deletion</h3>
           <p class="text-center mb-3">Are you sure you want to delete this <?= $itemType ?>?</p>
           <form id="deleteForm" action="<?= $deleteAction ?>" method="post">
               <input type="hidden" id="deleteId" name="id">
               <div class="modal-footer d-flex justify-content-between">
                   <button type="button" class="btn btn-secondary" id="cancelDelete">Cancel</button>
                   <button type="submit" class="btn btn-danger">Delete</button>
               </div>
           </form>
       </div>
   </div>
</div>
