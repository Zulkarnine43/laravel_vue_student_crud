<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                <h2>Add New </h2>
                         <form @submit.prevent="addStudent">
                            <div>
                        <div >
                            <div >
                            <input type="text"  placeholder="First Name" v-model="student.first_name" autocomplete="off">
                        </div>
                        </div>
                        <div >
                            <div >
                            <input type="text" placeholder="Last Name" v-model="student.last_name" autocomplete="off">
                        </div>
                        </div>
                            <div >
                            <div>
                                <select name=""  id="" v-model="student.gender">
                                    <option value="">-----</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                        </div>
                        </div>
                            <div >
                            <div >
                            <select name=""  v-model="student.country">
                                    <option value="">-----</option>
                                    <option value="The Gambia">The Gambia</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="usa">United State</option>
                                    <option value="australia">Australia</option>
                                </select>
                        </div>
                        </div>
                            <div >
                            <div >
                        <select name=""  v-model="student.class">
                                    <option value="">-----</option>
                                    <option value="class A">Class A</option>
                                    <option value="class B">Class B</option>
                                    <option value="class C">Class C</option>
                                    <option value="class D">Class D</option>
                                </select>
                        </div>
                        </div>
                        <div >
                            <div >
                        <input type="text"  placeholder="Phone Number" v-model="student.phone" autocomplete="off">
                        </div>
                        </div>

                        </div>
                            <div >
                        <div >
                        <button id="submit" type="submit">Save</button>
                            </div>
                            <div >
                        <button type="button" @click="clearForm()">Refresh</button>
                            </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>

    <div>
         <table border="1px solid">
          <thead>
              <tr>
              <th>Student Name</th>
              <th>Gender</th>
              <th>Phone</th>
              <th>Class</th>
              <th>Country</th>
              <th >Action</th>
              </tr>
          </thead>
          <tbody>
              <tr v-for="student in students" v-bind:key="student.id">
              <td>{{student.first_name + ' ' + student.last_name}}</td>
              <td>{{student.gender}}</td>
              <td>{{student.phone}}</td>
              <td>{{student.class}}</td>
              <td>{{student.country}}</td>
              <td>
                <a @click="editStudent(student)" href="#" >Edit</a>
                <a @click="deleteStudent(student.id)" href="#">Delete</a>
                </td>
              </tr>
          </tbody>
      </table>
    </div>


      </div>
</template>

<script>
import axios from 'axios'
    export default {
           data(){
              return{ 
                  student:{
                  first_name:'',
                   last_name:'',
                    gender:'',
                   phone:'',
                    class:'',
                   country:'',
               },
               students: [],
               student_id:'',
               edit:false
              }
           },
           created(){
               this.fetchStudents()
           },
           methods:{

            addStudent() {
              if (this.edit === false){
                fetch('http://localhost/blog/public/api/students', {
                method: 'post',
                body: JSON.stringify(this.student),
                headers: {
                    'content-type': 'application/json'
                }
                })
                .then(res =>{
                    alert('Student Added Successfully');
                })
                .catch(err => console.log(err));
             }else{
                  axios.put('http://localhost/blog/public/api/students/'+this.student_id, this.student)
                    .then(res => {
                        this.clearForm();
                        alert('Student Updated Successfully!');
                        this.fetchStudents();
                    })
                    .catch(err => console.log(err));
             }
            },
            fetchStudents(){
                    axios.get('http://localhost/blog/public/api/students')
                    .then(res => {
                    this.students = res.data;
                    // alert('Student List Show Successfully');
                    })
                    .catch(err => console.log(err));
               },
                   deleteStudent(id) {
                    if (confirm('Are You Sure You Want to Delete?' )) {
                        fetch(`http://localhost/blog/public/api/students/${id}`, {
                        method: 'delete'
                        })
                        .then(res => {
                            alert('Student Removed Successfully!');
                            this.fetchStudents();
                        })
                        .catch(err => console.log(err));
                      }
                    },
                        editStudent(student){
                          this.edit=true
                          this.student_id = student.id;
                          this.student.first_name = student.first_name;
                          this.student.last_name = student.last_name;
                          this.student.gender = student.gender;
                          this.student.phone = student.phone;
                          this.student.country = student.country;
                          this.student.class = student.class;
                          $('#submit').text('Update');  
                        }, 
                            clearForm() {      
                            //   this.student.id = null;
                            //   this.student.student_id = null;
                              this.edit = false;
                              this.student.first_name = '';
                              this.student.last_name = '';
                              this.student.gender = '';
                              this.student.phone = '';
                              this.student.country = '';
                              this.student.class = '';
                            }
            }



           }
</script>
