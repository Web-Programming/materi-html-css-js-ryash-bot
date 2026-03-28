
    var products = [
      {
        nama: "1000Dm",
        harga: 160000,
        diskon: 200000,
        stok: 10

      },
      {
        nama: "500GDm",
        harga: 180000,
        diskon: 0,
        stok: 0
      }
    ];

    function renderProducts() {
      var container = document.getElementById("product-container");
      container.innerHTML = "";

      products.forEach(function(product) {

        var teksHarga = "";
        var badge = "";

        if (product.diskon > 0) {
          badge = "<div class='badge'>🔥SALE</div>";

          teksHarga =
            "<div class='harga-asli'>Rp " + product.diskon.toLocaleString() + "</div>" +
            "<div class='harga-diskon'>Rp " + product.harga.toLocaleString() + "</div>";
        } else {
          teksHarga =
            "<div class='harga-diskon'>Rp " + product.harga.toLocaleString() + "</div>";
        }

        var tombol = "";
        if (product.stok > 0) {
          tombol = "<button onclick=\"beli('" + product.nama + "')\">🛒 Beli Sekarang</button>";
        } else {
          tombol = "<button disabled>❌ Stok Habis</button>";
        }

        var html =
          "<div class='card'>" +
          badge +
          "<h3>" + product.nama + "</h3>" +
          teksHarga +
          tombol +
          "</div>";

        container.innerHTML += html;
      });
    }

    function beli(nama) {
      alert("✅ Kamu membeli: " + nama);
    }

    renderProducts();