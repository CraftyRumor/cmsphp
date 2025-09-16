document.addEventListener('DOMContentLoaded', () => {
  const elementosAnimados = document.querySelectorAll('.secao-animada');

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      
      if (entry.isIntersecting) {
        entry.target.classList.add('animar'); 
        observer.unobserve(entry.target); 
      }
    });
  }, {
    threshold: 0.1
  });

  
  elementosAnimados.forEach(elemento => {
    observer.observe(elemento);
  });
});
