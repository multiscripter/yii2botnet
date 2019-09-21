<h1>Список персон</h1>
<table>
    <thead>
        <tr>
            <th>Ид</th>
            <th>Имя</th>
            <th>Фамилия</th>
        </tr>
    </thead>
    <tbody><?
        foreach ($persons as $person) { ?>
        <tr>
            <td><?=$person->getId();?></td>
            <td><?=$person->getFirstName();?></td>
            <td><?=$person->getLastName();?></td>
        </tr><?
        } ?>
    </tbody>
</table>
