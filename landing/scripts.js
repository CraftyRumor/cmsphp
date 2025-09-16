document.addEventListener('DOMContentLoaded', () => {
  const elementosAnimados = document.querySelectorAll('.secao-animada');

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      // Se o elemento estiver visível (intersecting)
      if (entry.isIntersecting) {
        entry.target.classList.add('animar'); // Adiciona a classe para disparar a animação
        observer.unobserve(entry.target); // Deixa de observar o elemento após a animação (para não animar de novo)
      }
    });
  }, {
    threshold: 0.1 // Opcional: porcentagem do elemento visível para acionar (10% neste caso)
  });

  // Observa cada elemento que queremos animar
  elementosAnimados.forEach(elemento => {
    observer.observe(elemento);
  });
});