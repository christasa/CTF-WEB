import { hashPassword } from '@foal/core';
import { IsEmail, IsNotEmpty, IsString } from 'class-validator';
import { Column, Entity, ObjectID, ObjectIdColumn } from 'typeorm';

@Entity()
export class User {

   @ObjectIdColumn()
   id: ObjectID;

   @IsEmail()
   @IsNotEmpty()
   @Column({ unique: true })
   email: string;

   @Column()
   isAdmin: boolean;

   @IsString()
   @IsNotEmpty()
   @Column()
   password: string;

   async setPassword(password: string) {
     this.password = await hashPassword(password);
   }

}
