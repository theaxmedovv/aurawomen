# AuraWomenuz Admin Dashboard

A modern, full-screen responsive admin panel UI for "AuraWomenuz" - a women's perfume and beauty e-commerce platform with Telegram integration.

## 🌟 Features

### Design

- **Luxury Feminine Style**: Pink, white, black, and gold color combinations
- **Modern & Clean**: Professional aesthetic with smooth animations
- **Responsive Design**: Fully responsive for desktop, tablet, and mobile
- **Premium Layout**: Soft shadows, rounded cards, elegant spacing

### Sections Included

#### 1. **Dashboard**

- Total Orders, Today Orders, Revenue, New Customers
- Pending Orders, Delivered Orders statistics
- Sales Charts and Monthly Analytics Graphs
- Top Selling Products
- Customer Growth Chart
- Recent Activities Timeline

#### 2. **Orders Management**

- Order ID, Customer Name, Phone, Address
- Ordered Products with Quantity and Total Price
- Payment Method and Date
- Order Status Workflow (7 stages)
- Change Status, View Details, Contact Customer
- Print Invoice, Filter & Search

#### 3. **Products Management**

- Add, Edit, Delete Products
- Product Image Upload
- Name, Description, Category
- Price with Discount
- Stock Quantity Management
- Product Availability Status
- Bestseller Badge

#### 4. **Customers**

- Customer Profiles
- Purchase History
- Total Spent Analysis
- Loyalty Level Tracking
- Lifetime Value Metrics

#### 5. **Categories**

- Category Management
- Product Count per Category
- Enable/Disable Categories

#### 6. **Telegram Posts**

- Create and Schedule Posts
- Upload Images
- Publish to Telegram Channel
- Track Post Analytics
- View/Edit/Delete Posts
- Engagement Metrics

#### 7. **Analytics & Reports**

- Revenue Trend Charts
- Product Performance Analysis
- Customer Activity Tracking
- Order Growth Analytics
- Telegram Traffic Analytics
- Monthly and Yearly Reports

#### 8. **Payments**

- Payment Transactions
- Payment Methods (Credit Card, Debit Card, Bank Transfer, Mobile Wallet)
- Payment Status
- Transaction History

#### 9. **Notifications**

- Order Alerts
- Customer Registration Alerts
- Product Review Alerts
- Low Stock Warnings
- Telegram Bot Notifications
- Email Notifications
- Notification Preferences

#### 10. **Reviews**

- Customer Product Reviews
- Star Ratings (1-5)
- Approve/Reject Reviews
- Review Moderation

#### 11. **Discounts & Promo Codes**

- Create Promo Codes
- Percentage and Fixed Discounts
- Usage Tracking
- Expiration Management
- Active/Inactive Status

#### 12. **Delivery Tracking**

- Order Delivery Status
- Real-time Tracking Timeline
- Delivery Status Updates
- Tracking History

#### 13. **Staff Management**

- Add/Remove Staff Members
- Role Management
- Staff Profiles
- Activity Tracking

#### 14. **Settings**

- Website Configuration
- Telegram Bot Settings
- Payment Gateway Configuration
- Social Media Links
- Admin Profile Management
- Security Settings

## 📁 Project Structure

```
resources/
├── views/admin/
│   ├── layout.blade.php              # Main layout template
│   ├── dashboard.blade.php           # Dashboard page
│   ├── orders.blade.php              # Orders management
│   ├── products.blade.php            # Products management
│   ├── categories.blade.php          # Categories
│   ├── telegram-posts.blade.php      # Telegram posts
│   ├── customers.blade.php           # Customers
│   ├── analytics.blade.php           # Analytics
│   ├── payments.blade.php            # Payments
│   ├── notifications.blade.php       # Notifications
│   ├── reviews.blade.php             # Reviews
│   ├── discounts.blade.php           # Discounts
│   ├── delivery.blade.php            # Delivery tracking
│   ├── staff.blade.php               # Staff management
│   └── settings.blade.php            # Settings
├── css/admin/
│   └── dashboard.css                 # Admin dashboard styles
└── js/admin/
    └── dashboard.js                  # Admin dashboard scripts

routes/
└── admin.php                         # Admin routes
```

## 🚀 Installation & Setup

### Step 1: Include Admin Routes

Add this to your `routes/web.php`:

```php
require __DIR__ . '/admin.php';
```

### Step 2: Ensure Authentication

The admin routes are protected with middleware. Make sure you have authentication set up:

```bash
php artisan make:auth
```

### Step 3: Create Admin Middleware (Optional but Recommended)

```bash
php artisan make:middleware IsAdmin
```

Update `routes/admin.php` to use admin middleware:

```php
Route::middleware(['web', 'auth', 'is.admin'])->prefix('admin')->group(function () {
    // Routes here
});
```

### Step 4: Link CSS and JS

Make sure your main `app.css` imports the admin dashboard CSS:

```css
@import "admin/dashboard.css";
```

Or include it in your blade template:

```html
<link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}" />
<script src="{{ asset('js/admin/dashboard.js') }}"></script>
```

## 🎨 Color Scheme

- **Primary Pink**: `#ec4899`
- **Secondary Purple**: `#a855f7`
- **Accent Gold**: `#fbbf24`
- **Dark Background**: `#1e293b`
- **Light Background**: `#f8f9fa`

## 📦 Dependencies

The admin dashboard uses:

- **Tailwind CSS** - For responsive utility classes
- **Font Awesome 6.4** - For icons
- **Chart.js** - For analytics charts

These are already included via CDN in the layout template.

## 🔧 Customization

### Modify Colors

Update the CSS variables in `resources/css/admin/dashboard.css`:

```css
:root {
    --primary-color: #ec4899;
    --secondary-color: #a855f7;
    --accent-gold: #fbbf24;
    /* ... */
}
```

### Add New Pages

1. Create a new blade template in `resources/views/admin/`
2. Extend the layout: `@extends('admin.layout')`
3. Add route in `routes/admin.php`
4. Add navigation item in `layout.blade.php` sidebar

### Customize Navigation

Edit the sidebar navigation in `resources/views/admin/layout.blade.php`:

```html
<a href="{{ route('admin.your-page') }}" class="nav-item">
    <i class="fas fa-icon"></i>
    <span>Your Page</span>
</a>
```

## 📊 Charts & Analytics

Charts are implemented using Chart.js. To add more charts:

```javascript
const ctx = document.getElementById("chartId").getContext("2d");
new Chart(ctx, {
    type: "line", // or 'bar', 'doughnut', 'pie', etc.
    data: {
        labels: ["Jan", "Feb", "Mar"],
        datasets: [
            {
                label: "Sales",
                data: [12, 19, 3],
                borderColor: "#ec4899",
                backgroundColor: "rgba(236, 72, 153, 0.1)",
            },
        ],
    },
    options: {
        responsive: true,
        // ... more options
    },
});
```

## 🔐 Security

- All routes are protected with `auth` middleware
- Add `is.admin` middleware for additional security
- Implement proper authorization checks in your controllers
- Validate all user inputs
- Use CSRF protection

## 📱 Responsive Breakpoints

- **Desktop**: 1024px and above
- **Tablet**: 768px - 1023px
- **Mobile**: Below 768px

## 🐛 Troubleshooting

### Charts not displaying?

- Make sure Chart.js is loaded
- Check browser console for errors
- Verify canvas element IDs match script references

### Styles not applied?

- Clear Laravel cache: `php artisan cache:clear`
- Rebuild CSS if using asset pipeline
- Check CSS is linked in layout

### Routes not working?

- Ensure admin routes file is included in web.php
- Check middleware is properly configured
- Verify route names match in links

## 🎯 Next Steps

1. **Create Controllers**: Build AdminController and related controllers
2. **Database Migrations**: Create migrations for products, orders, customers, etc.
3. **API Implementation**: Connect views to backend APIs
4. **Authentication**: Set up proper admin user authentication
5. **Authorization**: Implement role-based access control
6. **Validation**: Add server-side form validation
7. **File Upload**: Implement product image and post image uploads
8. **Telegram Integration**: Connect Telegram bot and channel APIs

## 📄 License

This admin dashboard is part of the AuraWomenuz project.

## 🤝 Support

For issues, questions, or feature requests, please contact the development team.

---

**Happy Coding! 🎉**
