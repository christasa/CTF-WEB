#!/usr/bin/env node
import 'source-map-support/register';

// std
// 3p
import { createServer, IncomingMessage, ServerResponse } from 'unit-http';
require('http').ServerResponse = ServerResponse;
require('http').IncomingMessage = IncomingMessage;
import {createApp} from '@foal/core';
import {createConnection} from 'typeorm';
const filter = require('content-filter');
// App
import { AppController } from './app/app.controller';

async function main() {
  const app = createApp(AppController, { preMiddlewares: [filter()]});
  await createConnection();
  const httpServer = createServer(app).listen();
}

main()
    .catch(err => { console.error(err); process.exit(1); });
