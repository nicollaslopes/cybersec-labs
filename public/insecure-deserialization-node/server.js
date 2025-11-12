var express = require('express');
var cookieParser = require('cookie-parser');
var serialize = require('node-serialize');
var escape = require('escape-html');
var bodyParser = require('body-parser');
var path = require('path');

var app = express();

app.use(cookieParser());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());
app.use(express.static(path.join(__dirname, 'public')));

// Página de login
app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'views', 'login.html'));
});

app.post('/verify', (req, res) => {
  const { username, password } = req.body;

  // Simulação de validação simples
  if (username === 'admin' && password === '1234') {
    const userObj = { username: username, role: 'admin' };
    const serialized = serialize.serialize(userObj);
    const encoded = Buffer.from(serialized).toString('base64');

    res.cookie('profile', encoded, { maxAge: 900000, httpOnly: true });
    return res.json({ success: true });
  } else {
    return res.json({ success: false, message: 'Invalid user or password.' });
  }
});

// Página de perfil
// Profile Page
app.get('/profile', (req, res) => {
  if (req.cookies.profile) {
    try {
      const str = Buffer.from(req.cookies.profile, 'base64').toString();
      const obj = serialize.unserialize(str);
      if (obj.username) {
        return res.send(`
          <html lang="en">
            <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>${escape(obj.username)}'s Profile</title>
              <link rel="stylesheet" href="/style.css">
            </head>
            <body class="profile-page">
              <div class="card">
                <div class="avatar">
                  <img src="https://ui-avatars.com/api/?name=${encodeURIComponent(obj.username)}&background=2575fc&color=fff&size=128" alt="Avatar">
                </div>
                <h1>Hello, ${escape(obj.username)} 👋</h1>
                <p>Welcome to your profile page.</p>
                <form action="/" method="GET">
                  <button class="btn">Log Out</button>
                </form>
              </div>
            </body>
          </html>
        `);
      }
    } catch (e) {
      console.error('Error deserializing cookie:', e);
    }
  }
  res.redirect('/');
});


app.listen(3000, () => console.log('Server running: http://localhost:3000'));
