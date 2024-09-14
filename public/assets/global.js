document.addEventListener('DOMContentLoaded', () => {
    initializeToast();
    initializeModals();
});

function initializeModals() {
    const addModal = document.getElementById('addModal');
    const editModal = document.getElementById('editModal');
    const deleteModal = document.getElementById('deleteModal');

    const openAddModalButton = document.getElementById('openAddModal');
    const closeAddModalButton = document.getElementById('closeAddModal');
    const closeEditModalButton = document.getElementById('closeEditModal');
    const closeDeleteModalButton = document.getElementById('closeDeleteModal');
    const cancelDeleteButton = document.getElementById('cancelDelete');

    if (openAddModalButton && addModal) {
        openAddModalButton.addEventListener('click', () => toggleModal(addModal, true));
    }

    if (closeAddModalButton && addModal) {
        closeAddModalButton.addEventListener('click', () => toggleModal(addModal, false));
    }

    if (closeEditModalButton && editModal) {
        closeEditModalButton.addEventListener('click', () => toggleModal(editModal, false));
    }

    if (closeDeleteModalButton && deleteModal) {
        closeDeleteModalButton.addEventListener('click', () => toggleModal(deleteModal, false));
    }

    if (cancelDeleteButton && deleteModal) {
        cancelDeleteButton.addEventListener('click', () => toggleModal(deleteModal, false));
    }

    const responsibilityTable = document.getElementById('responsibilityTable');
    if (responsibilityTable) {
        responsibilityTable.addEventListener('click', event => {
            if (event.target.classList.contains('edit-btn')) {
                const id = event.target.getAttribute('data-id');
                const name = event.target.getAttribute('data-name');
                openEditModal(id, name);
            }

            if (event.target.classList.contains('delete-btn')) {
                const id = event.target.getAttribute('data-id');
                openDeleteModal(id);
            }
        });
    }

    window.addEventListener('click', event => {
        if (addModal && event.target === addModal) {
            toggleModal(addModal, false);
        }
        if (editModal && event.target === editModal) {
            toggleModal(editModal, false);
        }
        if (deleteModal && event.target === deleteModal) {
            toggleModal(deleteModal, false);
        }
    });
}

function toggleModal(modal, show) {
    if (modal) {
        modal.style.display = show ? 'block' : 'none';
    }
}

function openEditModal(id, name) {
    const editModal = document.getElementById('editModal');
    if (editModal) {
        document.getElementById('editId').value = id;
        document.getElementById('editName').value = name;
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

function initializeToast() {
    const toast = document.querySelector('#toast .toast');
    const closeButton = document.querySelector('#closeToast');

    if (toast) {
        setTimeout(() => {
            toast.classList.remove('show');
        }, 5000);

        if (closeButton) {
            closeButton.addEventListener('click', () => {
                toast.classList.remove('show');
            });
        }
    }
}

(function() {
    'use strict';
    window.addEventListener('load', function() {
        const forms = document.getElementsByClassName('needs-validation');
        const validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();