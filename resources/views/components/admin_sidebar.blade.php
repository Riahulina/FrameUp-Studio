<style>
.sidebar {
    width: 260px;
    min-height: 100vh;
    background: #0E0E51;
    color: #D1C5F8;
    padding: 24px;
    padding-bottom: 80px;
    position: relative;
    box-shadow: 10px 0 30px rgba(0, 0, 0, 0.2);
    overflow-y: auto;
}

/* Menu */
.sidebar a {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px;
    border-radius: 12px;
    text-decoration: none;
    color: #D1C5F8;
    transition: 0.3s;
}

/* Hover */
.sidebar a:hover {
    background: rgba(209, 197, 248, 0.1);
    color: #E6F06A;
}

/* Active menu */
.sidebar a.active {
    background: #ffffff;
    color: #0E0E51;
    font-weight: bold;
}

/* Logo */
.sidebar .logo {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 40px;
}

.sidebar .logo-box {
    width: 48px;
    height: 48px;
    background: #E6F06A;
    border-radius: 12px;
    transform: rotate(6deg);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #0E0E51;
    font-weight: bold;
}

/* Footer */
.sidebar .footer {
    margin-top: 40px;
    font-size: 12px;
    opacity: 0.6;
}
</style>

<aside class="sidebar">

    {{-- LOGO --}}
    <div class="logo">
        <div class="logo-box">F</div>
        <div>
            <strong>FrameUp</strong><br>
            <small style="color:#E6F06A;">Studio</small>
        </div>
    </div>

    {{-- MENU --}}
    <nav>

        <a href="{{ url('/dashboard') }}"
           class="{{ request()->is('dashboard') ? 'active' : '' }}">
            🏠 Dashboard
        </a>

        <a href="{{ url('/frame') }}"
           class="{{ request()->is('frame') ? 'active' : '' }}">
            🖼️ Frames
        </a>

        <a href="{{ url('/pemesanan') }}"
           class="{{ request()->is('pemesanan') ? 'active' : '' }}">
            🛒 Pemesanan
        </a>

        <a href="{{ url('/pembayaran') }}"
           class="{{ request()->is('pembayaran') ? 'active' : '' }}">
            💳 Pembayaran
        </a>
        <a href="{{ url('/pembayaran') }}"
           class="{{ request()->is('pembayaran') ? 'active' : '' }}">
            💳 Pembayaran
        </a>

        <a href="{{ url('/contacts') }}"
           class="{{ request()->is('contacts') ? 'active' : '' }}">
            📞 Contacts
        </a>

        <a href="{{ url('/laporan') }}"
           class="{{ request()->is('laporan') ? 'active' : '' }}">
            📊 Laporan
        </a>

    </nav>
    

    {{-- FOOTER --}}
    <div class="footer">
        © {{ date('Y') }} FrameUp Studio
    </div>

</aside>