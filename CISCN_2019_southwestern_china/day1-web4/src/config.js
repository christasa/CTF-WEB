const config = {
  apiPrefix: '/api',
  server: {
    port: 3000
  },
  session: {
    name: 'SESSION',
    saveUninitialized: false,
    secret: 'SG9uZGEgVG9vcnU=',
    rolling: true,
    resave: false
  },
  whitelistPaths: [
    '/', '/api/read', '/api/write'
  ]
}

module.exports = config;
