document.getElementById('loadDataBtn').addEventListener('click', async function() {
    const responseElement = document.getElementById('response');
    responseElement.textContent = 'Chargement...';
    
    try {
        const response = await fetch('http://<votre-domaine>/public/api.php');
        const data = await response.json();
        
        if (data.success) {
            responseElement.textContent = `Données récupérées: ${data.message}`;
        } else {
            responseElement.textContent = 'Erreur lors de la récupération des données';
        }
    } catch (error) {
        console.error('Erreur réseau:', error);
        responseElement.textContent = 'Erreur de connexion';
    }
});