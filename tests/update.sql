update dogmeat set horse=2 dog='forty' where moose <> 'howdydoo';
update dogmeat set horse=2, dog='forty' where moose != 'howdydoo';
update dogmeat set horse=2, dog='forty' where moose <> 'howdydoo';
update table1 set col=1 where not col = 2;
update table2 set col=1 where col > 2 and col <> 4;
update table2 set col=1 where col > 2 and col <> 4 or dog="Hello";
update table3 set col=1 where col > 2 and col < 30;
