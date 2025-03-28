//création d'un port d'écoute sur le bouton send-panier
//lorsque l'utilisateur clique sur le bouton send-panier, on récupère le code du produit

let send_panier = document.querySelectorAll('.send_panier');
send_panier.forEach(function (send_panier) {
    send_panier.addEventListener('click', function () {
        const code = this.getAttribute('data-code');

        // Create modal elements
        let modal = document.createElement('div');
        modal.style.position = 'fixed';
        modal.style.top = '0';
        modal.style.left = '0';
        modal.style.width = '100%';
        modal.style.height = '100%';
        modal.style.backgroundColor = 'rgba(0,0,0,0.5)';
        modal.style.display = 'flex';
        modal.style.justifyContent = 'center';
        modal.style.alignItems = 'center';

        let modalContent = document.createElement('div');
        modalContent.style.backgroundColor = 'white';
        modalContent.style.padding = '20px';
        modalContent.style.borderRadius = '5px';
        modalContent.style.textAlign = 'center';

        let modalText = document.createElement('p');
        modalText.innerText = 'Veuillez entrer la quantité :';

        let modalInput = document.createElement('input');
        modalInput.type = 'number';
        modalInput.min = '1';

        let modalButton = document.createElement('button');
        modalButton.innerText = 'OK';

        // Append elements to modal content
        modalContent.appendChild(modalText);
        modalContent.appendChild(modalInput);
        modalContent.appendChild(modalButton);
        modal.appendChild(modalContent);
        document.body.appendChild(modal);

        // Add event listener to button
        modalButton.addEventListener('click', function () {
            let demandeQuantite = modalInput.value;
            sendPanier(code, demandeQuantite);
            document.body.removeChild(modal);
        });
    });
});
function sendPanier(code, quantite) {
    fetch('../page/core/add_panier.php', {
        method: 'POST',
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: JSON.stringify({
            product_token: code,
            quantity: quantite
        })
    })
        .then(response => response.json())
        .then(data => {

            if (data.status === 'success') {
                showNotification(data.message, 'success');
            } else {
                showNotification('Erreur lors de l\'ajout du produit au panier.', 'error');
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}



function showNotification(message, type) {
    let notification = document.createElement('div');
    notification.className = 'notification ' + type;
    notification.innerText = message;

    let progressBar = document.createElement('div');
    progressBar.className = 'progress-bar';

    notification.appendChild(progressBar);
    document.body.appendChild(notification);

    setTimeout(() => {
        notification.classList.add('fade-out');
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 500);
    }, 3000);

    let width = 100;
    let interval = setInterval(() => {
        if (width <= 0) {
            clearInterval(interval);
        } else {
            width--;
            progressBar.style.width = width + '%';
        }
    }, 30);
    // Add CSS for notification and progress bar
    const style = document.createElement('style');
    style.innerHTML = `
     .notification {
     height: 100px;
     position: fixed;
     top: 20px;
     right: 20px;
     background-color: #444;
     color: white;
     padding: 10px 20px;
     border-radius: 5px;
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
     opacity: 1;
     transition: opacity 0.5s ease;
     }
     .notification.success {
     background-color: #4caf50;
     }
     .notification.error {
     background-color: #f44336;
     }
     .notification .progress-bar {
     position: absolute;
     bottom: 0;
     left: 0;
     height: 5px;
     background-color: rgba(255, 255, 255, 0.5);
     width: 100%;
     }
     .notification.fade-out {
     opacity: 0;
     }
     `;
    document.head.appendChild(style);
}