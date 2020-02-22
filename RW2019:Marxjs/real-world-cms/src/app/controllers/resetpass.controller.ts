import {
    Config,
    Context,
    generateToken,
    Get,
    hashPassword, HttpResponseBadRequest, HttpResponseInternalServerError, HttpResponseNotFound,
    HttpResponseOK,
    HttpResponseRedirect, HttpResponseServerError,
    Post, render
} from '@foal/core';
import {ValidateBody} from '@foal/typestack';
import {IsEmail, IsNotEmpty} from 'class-validator';
import {createTransport} from 'nodemailer';
import {getMongoRepository} from 'typeorm';
import {User} from '../entities';

export class Email {
    @IsEmail()
    @IsNotEmpty()
    email: string;
}

export class ResetpassController {
  @Post()
  @ValidateBody(Email)
  async resetpass(ctx: Context) {
      const user = await getMongoRepository(User).findOne({ email: ctx.request.body.email });
      if (!user) {
          return new HttpResponseBadRequest('user not found');
      }
      const newpass = await generateToken();
      const passhash = await hashPassword(newpass);
      const res = await getMongoRepository(User).updateOne(
        { email: ctx.request.body.email }, { $set: { password: passhash}});
      if (!res) {
          return new HttpResponseInternalServerError('something error.');
      }
      const transporter = createTransport(
        Config.get('mailserver')
     );
      const message = {
      from: Config.get('mailfrom'),
      to: ctx.request.body.email,
      subject: '[😁] New password',
      text: 'Your new password: ' + newpass

    };

      const info = await transporter.sendMail(message);
      return new HttpResponseRedirect('/signin');
  }
    @Get()
    async index(ctx: Context) {
        return render('templates/resetpass.html');
    }

}
