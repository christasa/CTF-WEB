import {Context, controller, dependency, Get, HttpResponseOK, render, Session} from '@foal/core';
// tslint:disable-next-line:max-line-length
import { AdminController, IndexController, InitController, ResetpassController, SigninController, SignoutController, SignupController } from './controllers';

export class AppController {
  subControllers = [
    controller('/', IndexController),
    controller('/signup', SignupController),
    controller('/signin', SigninController),
    controller('/signout', SignoutController),
    controller('/resetpass', ResetpassController),
    controller('/admin', AdminController),
    controller('/init', InitController)
  ];
}
