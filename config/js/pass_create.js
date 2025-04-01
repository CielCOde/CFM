
//création de la modal 
// Création de la modal pour l'enregistrement d'un nouveau mot de passe
const modal = document.createElement('div');
modal.id = 'passwordModal';
modal.style.position = 'fixed';
modal.style.top = '50%';
modal.style.left = '50%';
modal.style.transform = 'translate(-50%, -50%)';
modal.style.width = '400px';
modal.style.padding = '20px';
modal.style.backgroundColor = '#fff';
modal.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
modal.style.zIndex = '1000';

// Contenu de la modal
const modalTitle = document.createElement('h2');
modalTitle.textContent = 'Créer un nouveau mot de passe';
modal.appendChild(modalTitle);

const passwordInput = document.createElement('input');
passwordInput.type = 'password';
passwordInput.placeholder = 'Entrez un nouveau mot de passe';
passwordInput.style.width = '100%';
passwordInput.style.marginBottom = '10px';
passwordInput.style.padding = '8px';
modal.appendChild(passwordInput);

const confirmPasswordInput = document.createElement('input');
confirmPasswordInput.type = 'password';
confirmPasswordInput.placeholder = 'Confirmez le mot de passe';
confirmPasswordInput.style.width = '100%';
confirmPasswordInput.style.marginBottom = '10px';
confirmPasswordInput.style.padding = '8px';
modal.appendChild(confirmPasswordInput);

const saveButton = document.createElement('button');
saveButton.textContent = 'Enregistrer';
saveButton.style.padding = '10px 20px';
saveButton.style.backgroundColor = '#007BFF';
saveButton.style.color = '#fff';
saveButton.style.border = 'none';
saveButton.style.cursor = 'pointer';
saveButton.onclick = () => {
    if (passwordInput.value === confirmPasswordInput.value) {
        const newpassword = passwordInput.value;
        savePassword(newpassword);
        document.body.removeChild(modal);
    } else {
        alert('Les mots de passe ne correspondent pas.');
    }
};
modal.appendChild(saveButton);

const cancelButton = document.createElement('button');
cancelButton.textContent = 'Annuler';
cancelButton.style.padding = '10px 20px';
cancelButton.style.marginLeft = '10px';
cancelButton.style.backgroundColor = '#6c757d';
cancelButton.style.color = '#fff';
cancelButton.style.border = 'none';
cancelButton.style.cursor = 'pointer';
cancelButton.onclick = () => {
    document.body.removeChild(modal);
};
modal.appendChild(cancelButton);

// Ajout de la modal au document
document.body.appendChild(modal);
const token = document.querySelector('meta[name="token"]').getAttribute('content');
console.log('Token:', token);

function savePassword(newpassword){
    fetch('../config/password_create.php', {
        method: 'POST',
        headers:{
            'Content-type': 'application/x-www-form-urlencoded'        
        },
        body: JSON.stringify({
            password: newpassword,
            token: token,
        }),
    })  
    .then(response => response.json())
    .then(data => {
        console.log(data);
        if (data.success === true) {
            alert(data.message);
        } else {
            alert('Erreur lors de l\'enregistrement du mot de passe.');
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
    });
    
}