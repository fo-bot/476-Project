document.addEventListener("DOMContentLoaded", function () {
  const loginForm = document.getElementById("loginForm");
  const searchForm = document.getElementById("searchForm");
  const updateForm = document.getElementById("updateForm");
  const deleteForm = document.getElementById("deleteForm");

  // ----------- inventory table --------------
  function loadInventory() {
    const inventoryContainer = document.getElementById("inventoryContainer");

    if (inventoryContainer) {
      fetch("get_inventory.php")
        .then((res) => res.text())
        .then((data) => {
          inventoryContainer.innerHTML = data;
        })
        .catch((err) => {
          inventoryContainer.innerHTML = "<p>Error loading inventory.</p>";
          console.error("Inventory error:", err);
        });
    }
  }

  // initial load
  loadInventory();

  // ------- login page -------
  if (loginForm) {
    loginForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const username = document.getElementById("username").value;
      const password = document.getElementById("password").value;

      fetch("login.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`
      })
        .then(res => res.text())
        .then(data => {
          if (data.trim() === "success") {
            window.location.href = "dashboard.html";
          } else {
            document.getElementById("loginError").textContent = "Invalid credentials.";
          }
        })
        .catch(err => {
          console.error("Login error:", err);
        });
    });
  }

  // -------- search --------
  if (searchForm) {
    searchForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const term = document.getElementById("searchInput").value.trim();
      const resultsContainer = document.getElementById("searchResults");

      if (term === "") {
        resultsContainer.innerHTML = "<p>Please enter a search term.</p>";
        return;
      }

      fetch(`search.php?term=${encodeURIComponent(term)}`)
        .then(res => res.text())
        .then(data => {
          resultsContainer.innerHTML = data;
        })
        .catch(err => {
          resultsContainer.innerHTML = "<p>Error loading search results.</p>";
          console.error("Search error:", err);
        });
    });
  }

  // -------- update --------
  if (updateForm) {
    updateForm.addEventListener("submit", function (e) {
      e.preventDefault();

      const formData = new FormData(updateForm);
      const updateMsg = document.getElementById("updateMsg");

      fetch("update.php", {
        method: "POST",
        body: formData,
      })
        .then(res => res.text())
        .then(data => {
          updateMsg.innerHTML = data;
          loadInventory(); // refresh the inventory table
        })
        .catch(err => {
          updateMsg.innerHTML = "<p>Error updating product.</p>";
          console.error("Update error:", err);
        });
    });
  }

  // ------ delete -------
  if (deleteForm) {
    deleteForm.addEventListener("submit", function (e) {
      e.preventDefault();

      const formData = new FormData(deleteForm);
      const deleteMsg = document.getElementById("deleteMsg");

      fetch("delete.php", {
        method: "POST",
        body: formData,
      })
        .then(res => res.text())
        .then(data => {
          deleteMsg.innerHTML = data;
          loadInventory(); // refresh the inventory table
        })
        .catch(err => {
          deleteMsg.innerHTML = "<p>Error deleting product.</p>";
          console.error("Delete error:", err);
        });
    });
  }
});

