import { drawTable } from "./drawtable.js"

export async function getData() {
    let data = await fetch('/api/persons')

    return data.json()
}

export async function getPerson(id) {
    let data = await fetch(`api/persons/${id}`)

    return data.json()
}

export async function updatePerson(form, id) {
    let name = form['name'].value
    let lastName = form['last-name'].value
    let email = form['email'].value

    let response = await fetch(`api/persons/${id}`, {
        headers: {
            'Content-Type': 'application/json',
            // 'Authorization' : `bearer ${window.CSRF_TOKEN}`
        },
        method: 'PUT',
        body: JSON.stringify({
            name: name,
            last_name: lastName,
            email: email
        })
    })

    let data = await getData()
    drawTable(data.data)
    return response.json()
}

export function deletePerson(id) {
    fetch(`api/persons/${id}`, {
            method: 'DELETE'
        })
        .then(res => res.json())
        .then(res => {
            alert(`persona eliminada: ${res.name}`)
            getData().then(res => {
                drawTable(res.data)
            })
        })
}