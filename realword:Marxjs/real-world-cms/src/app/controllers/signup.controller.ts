import {Context, dependency, Get, HttpResponseRedirect, Post, render, setSessionCookie} from '@foal/core';
import { MongoDBStore } from '@foal/mongodb';
import { isCommon } from '@foal/password';
import { ValidateBody } from '@foal/typestack';
import { getMongoRepository } from 'typeorm';

import { User } from '../entities';

export class SignupController {
  @dependency
  store: MongoDBStore;
  @Post()
  @ValidateBody(User)
  async register(ctx: Context) {
    if (await isCommon(ctx.request.body.password)) {
      return new HttpResponseRedirect('/signup?password_too_common=true');
    }
    let user = await getMongoRepository(User).findOne({ email: ctx.request.body.email });
    if (user) {
      return new HttpResponseRedirect('/signup?email_already_taken=true');
    }
    user = new User();
    user.email = ctx.request.body.email;
    user.isAdmin = false;

    await user.setPassword(ctx.request.body.password);
    await getMongoRepository(User).save(user);
    const session = await this.store.createAndSaveSession({id: user.id, isAdmin: user.isAdmin});
    const response = new HttpResponseRedirect('/');
    setSessionCookie(response, session.getToken());
    return response;
  }

  @Get()
  async index() {
      return render('templates/signup.html');
  }

}
