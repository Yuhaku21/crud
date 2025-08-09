<!DOCTYPE html>
<html>
<head>
    <title>CRUD PHP Vercel + FreeSQLDatabase</title>
</head>
<body>
    <h1>CRUD Demo</h1>
    <form id="form">
        <input type="text" name="name" placeholder="Nama" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit">Tambah</button>
    </form>
    <hr>
    <div id="list"></div>

    <script>
        async function loadData() {
            const res = await fetch('/api/read');
            const data = await res.json();
            document.getElementById('list').innerHTML = data.map(u => `
                <p>${u.name} (${u.email}) 
                <button onclick="deleteUser(${u.id})">Hapus</button></p>
            `).join('');
        }

        document.getElementById('form').addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            await fetch('/api/create', {
                method: 'POST',
                body: JSON.stringify({
                    name: formData.get('name'),
                    email: formData.get('email')
                })
            });
            loadData();
            e.target.reset();
        });

        async function deleteUser(id) {
            await fetch('/api/delete', {
                method: 'POST',
                body: JSON.stringify({ id })
            });
            loadData();
        }

        loadData();
    </script>
</body>
</html>
