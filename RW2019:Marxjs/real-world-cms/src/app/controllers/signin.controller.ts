import {
  Context,
  dependency,
  Get,
  HttpResponseRedirect,
  Post,
  render,
  setSessionCookie,
  verifyPassword
} from '@foal/core';
import {MongoDBStore} from '@foal/mongodb';
import { ValidateBody } from '@foal/typestack';
import {getRepository} from 'typeorm';
import { User } from '../entities';

export class SigninController {
  @dependency
  store: MongoDBStore;
  @Post()
  @ValidateBody(User)
  async login(ctx: Context) {
    const user = await getRepository(User).findOne({ email: ctx.request.body.email });
    if (!user) {
      return new HttpResponseRedirect('/signin?bad_credentials=true');
    }

    if (!await verifyPassword(ctx.request.body.password, user.password)) {
      return new HttpResponseRedirect('/signin?bad_credentials=true');
    }
    const session = await this.store.createAndSaveSession({id: user.id, isAdmin: user.isAdmin});
    const response = new HttpResponseRedirect('/');
    setSessionCookie(response, session.getToken());
    return response;
  }

  @Get()
  index(ctx: Context) {
    return render('templates/signin.html');
  }

}
