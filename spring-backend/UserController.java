package com.shourya.springlab.controller;


import com.shourya.springlab.model.User;
import com.shourya.springlab.repository.UserRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@RestController
@CrossOrigin("http://localhost:3001")
public class UserController {

    @Autowired
    private UserRepository userRepository;

    @PostMapping("/user")
    User newUser (@RequestBody User newUser){
        return userRepository.save(newUser);
    }

    @GetMapping("/users")
    List<User> getAllUsers(){
        return userRepository.findAll();
    }

    @PutMapping("/user/{id}")
    Optional<User> updateUser(@RequestBody User newUser, @PathVariable Long id){
        return userRepository.findById(id)
                .map(user -> {
                    user.setUsername(newUser.getUsername());
                    user.setName(newUser.getName());
                    user.setEmail(newUser.getEmail());
                    return userRepository.save(user);
                });
    }

    @DeleteMapping("/user/{id}")
    String deleteUser(@PathVariable Long id){
        userRepository.deleteById(id);
        return "user with id "+id+" has been deleted";
    }
}

//connection
//        spring.jpa.hibernate.ddl-auto = update
//        spring.datasource.url = jdbc:mysql://localhost:3306/spring
//        spring.datasource.username = root
//        spring.datasource.password = password
//        spring.datasource.driver-class-name = com.mysql.cj.jdbc.Driver

