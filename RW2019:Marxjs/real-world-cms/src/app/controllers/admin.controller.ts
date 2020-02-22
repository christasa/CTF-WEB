import {
  Context,
  dependency,
  Get,
  HttpResponseBadRequest,
  HttpResponseOK,
  HttpResponseRedirect,
  Post, render,
  TokenRequired
} from '@foal/core';
import {MongoDBStore} from '@foal/mongodb';
import {ValidateBody} from '@foal/typestack';
import {IsNotEmpty, IsUrl} from 'class-validator';
import {AdminRequired} from '../hooks/admin-required.hook';
const rp = require('request-promise');

export class Url {
  @IsUrl()
  @IsNotEmpty()
  url: string;
}
export class AdminController {
  @dependency
  store: MongoDBStore;
  private status: boolean;
  @Post()
  @TokenRequired({
    cookie: true,
    extendLifeTimeOrUpdate: false,
    redirectTo: '/signin',
    store: MongoDBStore,
  })
  @AdminRequired()
  @ValidateBody(Url)
  async checkstatus(ctx: Context) {
    await rp.head(ctx.request.body.url).then(() => { this.status = true; },
        () => { this.status = false; } );
    return new HttpResponseRedirect(this.status ? '/admin?alive=true' : '/admin?error=true');
  }
  @Get()
  @TokenRequired({
    cookie: true,
    extendLifeTimeOrUpdate: false,
    redirectTo: '/signin',
    store: MongoDBStore,
  })
  @AdminRequired()
  index(ctx: Context) {
    return render('templates/admin.html');
  }

}
