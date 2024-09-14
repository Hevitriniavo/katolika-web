document.addEventListener('DOMContentLoaded', () => {
    initializeModals();
});


function initializeModals() {
    const modals = {
        addModal: document.getElementById('addModal'),
        editModal: document.getElementById('editCommitteeModal'),
        deleteModal: document.getElementById('deleteModal'),
    };

    const buttons = {
        openAddModalButton: document.getElementById('openAddModal'),
        closeAddModalButton: document.getElementById('closeAddModal'),
        closeEditModalButton: document.getElementById('closeEditCommitteeModal'),
        closeDeleteModalButton: document.getElementById('closeDeleteModal'),
        cancelDeleteButton: document.getElementById('cancelDelete'),
    };

    if (buttons.openAddModalButton) {
        buttons.openAddModalButton.addEventListener('click', () => toggleModal(modals.addModal, true));
    }
    if (buttons.closeAddModalButton) {
        buttons.closeAddModalButton.addEventListener('click', () => toggleModal(modals.addModal, false));
    }
    if (buttons.closeEditModalButton) {
        buttons.closeEditModalButton.addEventListener('click', () => toggleModal(modals.editModal, false));
    }
    if (buttons.closeDeleteModalButton) {
        buttons.closeDeleteModalButton.addEventListener('click', () => toggleModal(modals.deleteModal, false));
    }
    if (buttons.cancelDeleteButton) {
        buttons.cancelDeleteButton.addEventListener('click', () => toggleModal(modals.deleteModal, false));
    }

    const responsibilityTable = document.getElementById('responsibilityCommitteeTable');
    if (responsibilityTable) {
        responsibilityTable.addEventListener('click', event => {
            const target = event.target;
            if (target.classList.contains('edit-btn')) {
                const id = target.getAttribute('data-committee-id');
                const name = target.getAttribute('data-committee-name');
                const code = target.getAttribute('data-committee-code');
                openEditModal(id, name, code);
            }

            if (target.classList.contains('delete-btn')) {
                const id = target.getAttribute('data-committee-id');
                openDeleteModal(id);
            }
        });
    }

    window.addEventListener('click', event => {
        if (event.target === modals.addModal) toggleModal(modals.addModal, false);
        if (event.target === modals.editModal) toggleModal(modals.editModal, false);
        if (event.target === modals.deleteModal) toggleModal(modals.deleteModal, false);
    });
}

function toggleModal(modal, show) {
    if (modal) {
        modal.style.display = show ? 'block' : 'none';
    }
}

function openEditModal(id, name, code) {
    const editModal = document.getElementById('editCommitteeModal');
    if (editModal) {
        document.getElementById('editId').value = id;
        document.getElementById('editName').value = name;
        document.getElementById('editCode').value = code;
        toggleModal(editModal, true);
    }
}

function openDeleteModal(id) {
    const deleteModal = document.getElementById('deleteModal');
    if (deleteModal) {
        document.getElementById('deleteId').value = id;
        toggleModal(deleteModal, true);
    }
}
