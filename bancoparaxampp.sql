drop schema if exists `dbpindura2` ;

create schema if not exists `dbpindura2` ;
use `dbpindura2` ;

create table if not exists `dbpindura2`.`pessoa` (
  `idpessoa` int not null auto_increment,
  `nmpessoa` varchar(127) not null,
  `dspessoa` varchar(255) null,
  primary key (`idpessoa`))
engine = innodb
auto_increment = 10002;


create table if not exists `dbpindura2`.`consumo` (
  `id` int not null auto_increment,
  `descritivo` varchar(255) not null,
  `valor` decimal(10,2) not null,
  `pago` char(1) not null,
  `idpessoa` int not null,
  primary key (`id`),
  constraint `fk_consumo_pessoa`
    foreign key (`idpessoa`)
    references `dbpindura2`.`pessoa` (`idpessoa`)
    on delete no action
    on update no action)
engine = innodb;

create table if not exists `dbpindura2`.`usuario` (
  `idusuario` int not null auto_increment,
  `nmusuario` varchar(45) not null,
  `pwusuario` varchar(255) not null,
  primary key (`idusuario`))
engine = innodb;

create table if not exists `dbpindura2`.`logpessoa` (
  `idlog` int not null auto_increment,
  `idpessoa` int null,
  `nmpessoa` varchar(127) null,
  `dspessoa` varchar(255) null,
  `acao` varchar(45) null,
  primary key (`idlog`))
engine = innodb;


start transaction;
use `dbpindura2`;
insert into `dbpindura2`.`pessoa` (`idpessoa`, `nmpessoa`, `dspessoa`) values (100, 'marcos a. lucas', 'professor da uri erechim');
insert into `dbpindura2`.`pessoa` (`idpessoa`, `nmpessoa`, `dspessoa`) values (200, 'evangisvaldo da silva', 'voluntário local');
insert into `dbpindura2`.`pessoa` (`idpessoa`, `nmpessoa`, `dspessoa`) values (300, 'scatamáfia da silva', 'desenvolvedora chefe da empresa');
insert into `dbpindura2`.`consumo` (`id`, `descritivo`, `valor`, `pago`, `idpessoa`) values (101, 'halls', 1.99, 's', 100);
insert into `dbpindura2`.`consumo` (`id`, `descritivo`, `valor`, `pago`, `idpessoa`) values (102, 'refri', 3, 'n', 100);
insert into `dbpindura2`.`consumo` (`id`, `descritivo`, `valor`, `pago`, `idpessoa`) values (201, 'refrigerante', 6, 'n', 200);
insert into `dbpindura2`.`consumo` (`id`, `descritivo`, `valor`, `pago`, `idpessoa`) values (202, 'diversos', 14, 'n', 200);
insert into `dbpindura2`.`consumo` (`id`, `descritivo`, `valor`, `pago`, `idpessoa`) values (301, 'agua com gas', 4, 's', 300);
insert into `dbpindura2`.`usuario` (`idusuario`, `nmusuario`, `pwusuario`) values (0, 'admin', '21232f297a57a5a743894a0e4a801fc3');
commit;

use `dbpindura2`;

delimiter $$
use `dbpindura2`$$
create definer = current_user trigger `dbpindura2`.`pessoa_after_insert` after insert on `pessoa` for each row
begin
  insert into logpessoa (idlog, idpessoa, nmpessoa, dspessoa, acao) values
  (0, new.idpessoa, new.nmpessoa, new.dspessoa, 'inserir');
end$$

use `dbpindura2`$$
create definer = current_user trigger `dbpindura2`.`pessoa_before_update` before update on `pessoa` for each row
begin
  insert into logpessoa (idlog, idpessoa, nmpessoa, dspessoa, acao) values
  (0, old.idpessoa, old.nmpessoa, old.dspessoa, 'tentou alterar');
end$$

use `dbpindura2`$$
create definer = current_user trigger `dbpindura2`.`pessoa_after_update` after update on `pessoa` for each row
begin
  insert into logpessoa (idlog, idpessoa, nmpessoa, dspessoa, acao) values
  (0, new.idpessoa, new.nmpessoa, new.dspessoa, 'alterou para');
end$$

use `dbpindura2`$$
create definer = current_user trigger `dbpindura2`.`pessoa_before_delete` before delete on `pessoa` for each row
begin
  insert into logpessoa (idlog, idpessoa, nmpessoa, dspessoa, acao) values
  (0, old.idpessoa, old.nmpessoa, old.dspessoa, 'excluiu');
end$$


delimiter ;
