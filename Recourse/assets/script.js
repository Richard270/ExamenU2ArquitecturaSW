
const teachersContainer = document.getElementById('teachersContainer')
const fetchTeachers = async () => {
    const res = await fetch('http://localhost:8000/api/teacher/')
    if (!res.ok) throw new Error(`HTTP error! status: ${response.status}`)
    return res.json()
}

fetchTeachers().then(({data: teachers}) => {
    console.log(teachers)
    let teachersList = ''
    for(teacher of teachers) {
        const {name, first_surname: firstSurname, second_surname: secondSurname, degree, courses} = teacher

        let coursesList = ''
        for (course of courses) {
            coursesList += `<li>${course.name}</li>`
        }

        teachersList += `
        <tr>
            <td><h5>${name} ${firstSurname} ${secondSurname}</h5></td>
            <td><h5>${degree}</h5></td>
            <td><ul>${coursesList}</ul></td>
        </tr>`
    }
    teachersContainer.innerHTML = teachersList
})