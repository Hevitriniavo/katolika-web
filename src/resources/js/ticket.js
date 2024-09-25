function updateLabel(checkbox, label) {
    label.textContent = checkbox.checked ? 'Payé' : 'Non payé';
}

document.addEventListener('DOMContentLoaded', function () {
    const addCheckbox = document.getElementById('paidSwitch');
    const addLabel = document.getElementById('switchLabel');
    updateLabel(addCheckbox, addLabel);

    addCheckbox.addEventListener('change', function () {
        updateLabel(addCheckbox, addLabel);
    });

    const editCheckbox = document.getElementById('editPaidSwitch');
    const editLabel = document.getElementById('editSwitchLabel');
    updateLabel(editCheckbox, editLabel);

    editCheckbox.addEventListener('change', function () {
        updateLabel(editCheckbox, editLabel);
    });

    const editButtons = document.querySelectorAll('.edit-ticket-btn');
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const ticketId = this.getAttribute('data-id');
            const from = this.getAttribute('data-from');
            const to = this.getAttribute('data-to');
            const operationId = this.getAttribute('data-operation_id');
            const accountId = this.getAttribute('data-account_id');
            const paid = this.getAttribute('data-paid');
            const distribution = this.getAttribute('data-distribution');

            document.getElementById('editTicketId').value = ticketId;
            document.getElementById('editFrom').value = from;
            document.getElementById('editTo').value = to;
            document.getElementById('editOperationId').value = operationId;
            document.getElementById('editAccountId').value = accountId;
            document.getElementById('editDistribution').value = distribution;
            editCheckbox.checked = paid === '1';
            updateLabel(editCheckbox, editLabel);

            const editModal = document.getElementById('editTicketModal');
            editModal.classList.add('show');
            editModal.style.display = 'block';
            document.body.classList.add('modal-open');

            const closeButtons = editModal.querySelectorAll('[data-dismiss="modal"]');
            closeButtons.forEach(closeButton => {
                closeButton.addEventListener('click', function () {
                    closeModal(editModal);
                });
            });
        });
    });

    function closeModal(modal) {
        modal.classList.remove('show');
        modal.style.display = 'none';
        document.body.classList.remove('modal-open');
    }

    window.addEventListener('click', function(event) {
        const editModal = document.getElementById('editTicketModal');
        if (event.target === editModal) {
            closeModal(editModal);
        }
    });
});
