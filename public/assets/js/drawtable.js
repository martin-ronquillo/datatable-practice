import { deletePerson, getPerson } from "./endpoints.js";
import template from "./template.js";

let tPerson = document.getElementById('tPerson');
export let personId = null

export function drawTable(data) {
    tPerson.innerHTML = '';

    data.map(person => {
        tPerson.insertAdjacentHTML('beforeend', template(person))
        document.getElementById('btn-edit-' + person.id).onclick = async() => {
            personId = person.id
            let personn = await getPerson(person.id)
            const { data } = personn
            let form = document.forms['edit-person']
            form['name'].value = data.name
            form['last-name'].value = data.last_name
            form['email'].value = data.email
        }
        document.getElementById('btn-delete-' + person.id).onclick = () => {
            deletePerson(person.id)
        }
    })
}