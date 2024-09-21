document.addEventListener('DOMContentLoaded', () => {
    const createModal = document.getElementById('createModal');
    const editModal = document.getElementById('editModal');
    const deleteModal = document.getElementById('deleteModal');

    const showModal = (modal) => {
        modal.classList.add('show');
        modal.style.display = 'block';
    };

    const hideModal = (modal) => {
        modal.classList.remove('show');
        modal.style.display = 'none';
    };

    document.getElementById('openCreateModal').addEventListener('click', () => {
        showModal(createModal);
    });

    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', (event) => {
            const { id, name, ticket_count, operation_date, description, ticket_price } = event.target.dataset;
            document.getElementById('editId').value = id;
            document.getElementById('editName').value = name;
            document.getElementById('editTicketCount').value = ticket_count;
            document.getElementById('editOperationDate').value = operation_date;
            document.getElementById('editDescription').value = description;
            document.getElementById('editTicketPrice').value = ticket_price;
            showModal(editModal);
        });
    });

    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', (event) => {
            document.getElementById('deleteId').value = event.target.dataset.id;
            showModal(deleteModal);
        });
    });

    document.querySelectorAll('.close-btn').forEach(button => {
        button.addEventListener('click', (event) => {
            const modal = event.target.closest('.modal');
            hideModal(modal);
        });
    });

    document.getElementById('createForm').addEventListener('submit', async () => {
        hideModal(createModal);
    });

    document.getElementById('editForm').addEventListener('submit', async () => {
        hideModal(editModal);
    });

    document.getElementById('deleteForm').addEventListener('submit', async () => {
        hideModal(deleteModal);
    });
});
