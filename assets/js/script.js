// Validação de formulário
document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        // Remover mensagens de erro ao focar no input
        const inputs = form.querySelectorAll('input[required]');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.classList.remove('input-error');
                const errorMsg = this.nextElementSibling;
                if (errorMsg && errorMsg.classList.contains('error-message')) {
                    errorMsg.remove();
                }
            });
            
            input.addEventListener('input', function() {
                this.classList.remove('input-error');
                const errorMsg = this.nextElementSibling;
                if (errorMsg && errorMsg.classList.contains('error-message')) {
                    errorMsg.remove();
                }
            });
        });
        
        // Validação ao submeter
        form.addEventListener('submit', function(e) {
            const inputs = form.querySelectorAll('input[required]');
            let isValid = true;
            
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('input-error');
                    
                    // Remover mensagem anterior se existir
                    const existingMsg = input.nextElementSibling;
                    if (existingMsg && existingMsg.classList.contains('error-message')) {
                        existingMsg.remove();
                    }
                    
                    // Criar e inserir mensagem de erro
                    const errorMsg = document.createElement('span');
                    errorMsg.classList.add('error-message');
                    errorMsg.textContent = 'Este campo é obrigatório';
                    input.parentNode.insertBefore(errorMsg, input.nextSibling);
                } else {
                    input.classList.remove('input-error');
                    const errorMsg = input.nextElementSibling;
                    if (errorMsg && errorMsg.classList.contains('error-message')) {
                        errorMsg.remove();
                    }
                }
            });
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    });
});

// Função para exibir alerta
function showAlert(message, type = 'error') {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type}`;
    alertDiv.textContent = message;
    document.body.insertBefore(alertDiv, document.body.firstChild);
    
    setTimeout(() => {
        alertDiv.remove();
    }, 5000);
}

// Validação de email
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}
