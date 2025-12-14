document.addEventListener('DOMContentLoaded', () => {
  const form = document.querySelector('.formulario-pedido');

  form.addEventListener('submit', (e) => {
    const inputs = form.querySelectorAll('input, select, textarea');
    let valid = true;

    inputs.forEach(input => {
      if (!input.checkValidity()) {
        valid = false;
        input.classList.add('error');
        input.focus();
      } else {
        input.classList.remove('error');
      }
    });

    if (!valid) {
      e.preventDefault();
      alert('Por favor completa todos los campos correctamente antes de enviar.');
    }
  });
});
