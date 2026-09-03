<form method="get" action="<?= site_url('chartjs/inventory') ?>">

    <select name="ram">
        <option value="">All RAM</option>
        <option>4 GB</option>
        <option>8 GB</option>
        <option>16 GB</option>
        <option>32 GB</option>
    </select>

    <select name="processor">
        <option value="">All CPU</option>
        <option>Intel Core i3</option>
        <option>Intel Core i5</option>
        <option>Intel Core i7</option>
        <option>AMD Ryzen 5</option>
    </select>

    <select name="operating_system">
        <option value="">All Windows</option>
        <option>Windows 10</option>
        <option>Windows 11</option>
    </select>

    <select name="sections">
        <option value="">All Sections</option>
        <option>IT</option>
        <option>Finance</option>
        <option>HR</option>
    </select>

    <button type="submit">
        Filter
    </button>

</form>
