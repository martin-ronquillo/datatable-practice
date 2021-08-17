export default function template(person) {
    return `
        <tr>
            <td>${person.name}</td>
            <td>${person.last_name}</td>
            <td>${person.born_day}</td>
            <td>${person.email}</td>
            <td><button id="btn-edit-${person.id}" class="btn btn-sm btn-primary mt-2">Editar</button></td>
            <td><button id="btn-delete-${person.id}" class="btn btn-sm btn-primary mt-2">Eliminar</button></td>
        </tr>
    `
}