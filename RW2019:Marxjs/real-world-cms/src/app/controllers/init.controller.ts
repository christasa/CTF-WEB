import { Context, Get, HttpResponseOK ,generateToken, HttpResponseRedirect} from '@foal/core';
import {User} from "../entities";
import {getMongoRepository} from 'typeorm';
export class InitController {

  @Get('/')
  async index(ctx: Context) {

    if ( process.env['INSTALL_LOCK'] !== 'LOCKED'){
      try{
        await getMongoRepository(User).clear();
      } catch (e) {
        console.log(e);
      }
      const user = new User();
      user.email = 'admin@realworldctf.com';
      user.isAdmin = true;
      const password = await generateToken();
      await user.setPassword(password);
      await getMongoRepository(User).save(user);
      process.env['INSTALL_LOCK'] = 'LOCKED';
      return new HttpResponseRedirect('/?init_ok=true');
    } else {
      return new HttpResponseRedirect('/');
    }
  }

}
