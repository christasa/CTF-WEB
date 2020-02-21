import {
  Context,
  dependency,
  Get,
  HttpResponseRedirect,
  removeSessionCookie,
  Session,
  TokenRequired
} from '@foal/core';
import {MongoDBStore} from '@foal/mongodb';
import {User} from '../entities';

export class SignoutController {
  @dependency
  store: MongoDBStore;
  @Get()
  @TokenRequired({
    cookie: true,
    extendLifeTimeOrUpdate: false,
    redirectTo: '/signin',
    store: MongoDBStore,
  })
  async logout(ctx: Context<User, Session>) {
    await this.store.destroy(ctx.session.sessionID);

    const response = new HttpResponseRedirect('/signin');
    removeSessionCookie(response);
    return response;
  }

}
