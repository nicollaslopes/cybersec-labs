// verify.js
const express = require('express');
const router = express.Router();
const cookie = require('cookie');

router.post('/', (req, res) => {
  const { username, password } = req.body || {};

  // Simples validação para o lab
  if (username === 'admin' && password === 'admin') {
    const userObj = {
      nome: 'Administrador',
      role: 'admin',
      data: new Date().toISOString()
    };

    // Serializa o objeto em JSON e coloca no cookie (inseguro por design para o lab)
    const serialized = cookie.serialize('user', JSON.stringify(userObj), {
      path: '/',
      maxAge: 60 * 60 * 24 // 1 dia
      // NOTA: não colocamos HttpOnly, Secure ou assinatura para demonstrar insegurança
    });

    // Envia o cookie e um body de sucesso — o cliente fará o redirecionamento
    res.setHeader('Set-Cookie', serialized);
    return res.json({ ok: true, message: 'Login bem-sucedido' });
  }

  // Falha de autenticação
  return res.status(401).json({ ok: false, message: 'Usuário ou senha inválidos' });
});

module.exports = router;
