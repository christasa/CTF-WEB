import {Context, dependency, Get, HttpResponseOK, Post, render, TokenRequired} from '@foal/core';
import {MongoDBStore} from '@foal/mongodb';
import {AdminRequired} from '../hooks/admin-required.hook';

export class IndexController {
  @dependency
  store: MongoDBStore;
  @Get()
  @TokenRequired({
    cookie: true,
    extendLifeTimeOrUpdate: false,
    redirectTo: '/signin',
    store: MongoDBStore,
  })
  async index(ctx: Context) {
    return render('templates/index.html');
  }

}
