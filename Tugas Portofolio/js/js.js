document.addEventListener("DOMContentLoaded", function () {

  window.scrollToSection = function(id) {
    document.getElementById(id).scrollIntoView({ behavior: "smooth" });
  };

  const faders = document.querySelectorAll('.fade-in');

  window.addEventListener('scroll', () => {
    faders.forEach(el => {
      const rect = el.getBoundingClientRect().top;
      if (rect < window.innerHeight - 100) {
        el.classList.add('show');
      }
    });
  });

  const form = document.getElementById("contactForm");
  if (form) {
    form.addEventListener("submit", function(e){
      e.preventDefault();
      alert("Pesan berhasil dikirim!");
    });
  }

  const ctx = document.getElementById('skillsChart');
  if (ctx) {
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['HTML', 'CSS', 'JavaScript', 'Java'],
        datasets: [{
          data: [5, 10, 15, 20],
          borderColor: '#0d6efd',
          backgroundColor: 'rgba(13, 110, 253, 0.2)',
          tension: 0.4, // bikin garis melengkung
          pointBackgroundColor: '#0d6efd',
          pointRadius: 5
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            max: 100
          }
        }
      }
    });
  }
});
