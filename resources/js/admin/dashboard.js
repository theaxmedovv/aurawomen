/**
 * AuraWomenuz Admin Dashboard
 * Main JavaScript Functionality
 */

// Toggle Sidebar on Mobile
function toggleSidebar() {
    const sidebar = document.querySelector(".sidebar");
    if (sidebar) {
        sidebar.classList.toggle("open");
    }
}

// Close sidebar when clicking outside on mobile
document.addEventListener("click", function (event) {
    const sidebar = document.querySelector(".sidebar");
    const toggleBtn = document.querySelector(
        'button[onclick="toggleSidebar()"]',
    );

    if (
        sidebar &&
        !sidebar.contains(event.target) &&
        toggleBtn &&
        !toggleBtn.contains(event.target)
    ) {
        sidebar.classList.remove("open");
    }
});

// Status Badge Color Coding
function getStatusBadgeClass(status) {
    const statusMap = {
        Delivered: "bg-green-100 text-green-700",
        Shipping: "bg-blue-100 text-blue-700",
        "Preparing Order": "bg-orange-100 text-orange-700",
        Approved: "bg-purple-100 text-purple-700",
        "Under Review": "bg-yellow-100 text-yellow-700",
        "New Order Received": "bg-pink-100 text-pink-700",
        Cancelled: "bg-red-100 text-red-700",
    };

    return statusMap[status] || "bg-gray-100 text-gray-700";
}

// Update Order Status
function updateOrderStatus(orderId, newStatus) {
    // Show loading state
    showNotification("Updating order status...", "info");

    // Simulate API call
    setTimeout(function () {
        showNotification(
            `Order #${orderId} updated to ${newStatus}`,
            "success",
        );
    }, 500);
}

// Search and Filter
function searchOrders(searchTerm) {
    const rows = document.querySelectorAll("tbody tr");
    rows.forEach((row) => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchTerm.toLowerCase())
            ? ""
            : "none";
    });
}

// Notification Toast
function showNotification(message, type = "info") {
    const toast = document.createElement("div");
    toast.className = `fixed top-4 right-4 px-6 py-3 rounded-lg text-white font-semibold z-50 animate-fade-in`;

    const bgColor =
        {
            success: "bg-green-500",
            error: "bg-red-500",
            warning: "bg-yellow-500",
            info: "bg-blue-500",
        }[type] || "bg-gray-500";

    toast.classList.add(bgColor);
    toast.textContent = message;
    toast.innerHTML +=
        '<button onclick="this.parentElement.remove()" class="ml-4 text-lg">×</button>';

    document.body.appendChild(toast);

    setTimeout(() => {
        toast.remove();
    }, 3000);
}

// Delete with Confirmation
function deleteWithConfirmation(itemName, callback) {
    if (confirm(`Are you sure you want to delete ${itemName}?`)) {
        if (callback) callback();
        showNotification(`${itemName} deleted successfully`, "success");
    }
}

// Export Data to CSV
function exportToCSV(fileName = "export") {
    const table = document.querySelector("table");
    if (!table) {
        showNotification("No table found to export", "error");
        return;
    }

    let csv = "";
    const rows = table.querySelectorAll("tr");

    rows.forEach((row) => {
        const cells = row.querySelectorAll("td, th");
        const rowData = Array.from(cells)
            .map((cell) => cell.textContent.trim())
            .join(",");
        csv += rowData + "\n";
    });

    const blob = new Blob([csv], { type: "text/csv" });
    const url = window.URL.createObjectURL(blob);
    const link = document.createElement("a");
    link.href = url;
    link.download = `${fileName}.csv`;
    link.click();

    showNotification("Data exported successfully", "success");
}

// Print Invoice
function printInvoice(orderId) {
    const printWindow = window.open("", "", "height=600,width=800");
    printWindow.document.write(`
        <html>
            <head>
                <title>Invoice #${orderId}</title>
                <style>
                    body { font-family: Arial, sans-serif; }
                    .invoice { max-width: 600px; margin: 20px; }
                    .header { text-align: center; margin-bottom: 30px; }
                    .header h1 { color: #ec4899; }
                    .details { margin: 20px 0; }
                    .details p { margin: 5px 0; }
                    table { width: 100%; border-collapse: collapse; margin: 20px 0; }
                    th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
                    .total { text-align: right; font-size: 18px; font-weight: bold; margin: 20px 0; }
                </style>
            </head>
            <body>
                <div class="invoice">
                    <div class="header">
                        <h1>AuraWomenuz</h1>
                        <h2>Invoice</h2>
                        <p>Order #${orderId}</p>
                    </div>
                    <div class="details">
                        <p><strong>Date:</strong> ${new Date().toLocaleDateString()}</p>
                        <p><strong>Status:</strong> Pending</p>
                    </div>
                    <table>
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </table>
                    <div class="total">Total: $XXX.XX</div>
                </div>
            </body>
        </html>
    `);
    printWindow.print();
}

// Initialize Chart Responsive
function initializeCharts() {
    const charts = document.querySelectorAll("canvas");
    charts.forEach((chart) => {
        const container = chart.parentElement;
        if (container) {
            container.style.position = "relative";
        }
    });
}

// Date Range Filter
function filterByDateRange(startDate, endDate) {
    showNotification(`Filtering from ${startDate} to ${endDate}`, "info");
    // Add your filtering logic here
}

// Customer Profile Modal
function viewCustomerProfile(customerId) {
    showNotification(`Loading profile for customer #${customerId}`, "info");
    // Add modal opening logic here
}

// Contact Customer
function contactCustomer(phone) {
    window.open(`tel:${phone}`);
    showNotification(`Initiating call to ${phone}`, "success");
}

// Initialize Tooltips
function initializeTooltips() {
    const elements = document.querySelectorAll("[title]");
    elements.forEach((element) => {
        element.addEventListener("mouseenter", function () {
            const tooltip = document.createElement("div");
            tooltip.className =
                "absolute bg-gray-800 text-white px-2 py-1 rounded text-xs z-50 pointer-events-none";
            tooltip.textContent = this.getAttribute("title");
            tooltip.style.bottom = "120%";
            tooltip.style.left = "50%";
            tooltip.style.transform = "translateX(-50%)";
            this.appendChild(tooltip);
        });

        element.addEventListener("mouseleave", function () {
            const tooltip = this.querySelector("div");
            if (tooltip) tooltip.remove();
        });
    });
}

// Handle Form Submission
function handleFormSubmit(event) {
    event.preventDefault();
    const form = event.target;
    const formData = new FormData(form);

    // Simulate form submission
    showNotification("Form submitted successfully", "success");

    // Reset form
    form.reset();
}

// Category Filter
function filterByCategory(category) {
    const items = document.querySelectorAll("[data-category]");
    items.forEach((item) => {
        if (category === "all" || item.dataset.category === category) {
            item.style.display = "";
            item.style.animation = "fadeIn 0.3s ease";
        } else {
            item.style.display = "none";
        }
    });
}

// Product Image Preview
function previewProductImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const preview = document.querySelector("[data-preview]");
            if (preview) {
                preview.src = e.target.result;
                preview.style.display = "block";
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// Tab Navigation
function switchTab(tabName) {
    const tabs = document.querySelectorAll("[data-tab]");
    const buttons = document.querySelectorAll("[data-tab-button]");

    tabs.forEach((tab) => {
        tab.style.display = tab.dataset.tab === tabName ? "block" : "none";
    });

    buttons.forEach((btn) => {
        btn.classList.toggle("active", btn.dataset.tabButton === tabName);
    });
}

// Pagination
function goToPage(pageNumber) {
    showNotification(`Going to page ${pageNumber}`, "info");
    window.scrollTo(0, 0);
    // Add your pagination logic here
}

// Real-time Search
let searchTimeout;
function realtimeSearch(searchInput, selector) {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        const searchTerm = searchInput.value.toLowerCase();
        const items = document.querySelectorAll(selector);

        items.forEach((item) => {
            const text = item.textContent.toLowerCase();
            item.style.display = text.includes(searchTerm) ? "" : "none";
        });
    }, 300);
}

// Initialize Dashboard
document.addEventListener("DOMContentLoaded", function () {
    // Initialize all interactive elements
    initializeTooltips();
    initializeCharts();

    // Add event listeners
    const searchInputs = document.querySelectorAll('input[type="text"]');
    searchInputs.forEach((input) => {
        if (input.placeholder.toLowerCase().includes("search")) {
            input.addEventListener("keyup", function () {
                realtimeSearch(this, "tbody tr");
            });
        }
    });

    // Status select change handler
    document.querySelectorAll(".status-select").forEach((select) => {
        select.addEventListener("change", function () {
            const newStatus = this.value;
            showNotification(`Status updated to: ${newStatus}`, "success");
        });
    });

    // Form handlers
    const forms = document.querySelectorAll("form");
    forms.forEach((form) => {
        form.addEventListener("submit", handleFormSubmit);
    });
});

// Export functions for global use
window.updateOrderStatus = updateOrderStatus;
window.showNotification = showNotification;
window.searchOrders = searchOrders;
window.deleteWithConfirmation = deleteWithConfirmation;
window.exportToCSV = exportToCSV;
window.printInvoice = printInvoice;
window.contactCustomer = contactCustomer;
window.viewCustomerProfile = viewCustomerProfile;
window.toggleSidebar = toggleSidebar;
window.filterByDateRange = filterByDateRange;
window.filterByCategory = filterByCategory;
window.switchTab = switchTab;
window.goToPage = goToPage;
