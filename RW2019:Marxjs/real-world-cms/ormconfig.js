const { Config } = require('@foal/core');

module.exports = {
  type: "mongodb",
  host:"10.0.20.12",
  port: 27017,
  database: Config.get('database.database'),
  entities: ["build/app/**/*.entity.js"],
  migrations: ["build/migrations/*.js"],
  cli: {
    migrationsDir: "src/migrations"
  },
  synchronize: Config.get('database.synchronize', false)
}
