let done = document.querySelector('done')

function cross(param){
    let el = document.getElementById(param)
    el.classList.toggle("crossed")
}

function edit(id,txt_text){
    
    // Create a form to store the elements of the new task
    let form = document.createElement('form')
    form.action = 'public.controller.php?action=update'
    form.method = 'post'
    
    // Creates an input to the new task
    let inputTask = document.createElement('input')
    inputTask.type = 'text'
    inputTask.name = 'task'
    inputTask.className = 'task'
    inputTask.value = txt_text
    
    // Create a hidden input to store task id
    let inputId = document.createElement('input')
    inputId.type = 'hidden'
    inputId.name = 'id'
    inputId.value = id
    
    // Button to send the form
    let button = document.createElement('button')
    button.type = 'submit'
    button.className = 'btn'
    button.innerHTML = 'Overwrite'
    
    // Include eleements in the form
    form.appendChild(inputTask)  
    form.appendChild(inputId)
    form.appendChild(button)
    
    // Erase the task value
    let task = document.getElementById(id)
    task.innerHTML = ''
    task.insertBefore(form, task[0])
    
}

function del(id){
    location.href = 'index.php?action=delete&id='+id;
}
