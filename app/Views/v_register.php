<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation Codeigniter 4 with Flashdata and Bootstrap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Form Validation Codeigniter 4 dengan Flashdata dan Bootstrap
            </div>
            <?php echo form_open('/home/proses_register'); ?>
            <div class="card-body">
                <!-- cek validasi -->
                <?php
                    $inputs = session()->getFlashdata('inputs');
                    $errors = session()->getFlashdata('errors');
                    $success = session()->getFlashdata('success');
                    if(!empty($errors)){ ?>
                    <div class="alert alert-danger" role="alert">
                        Whoops! Ada kesalahan saat input data, yaitu:
                        <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                        </ul>
                    </div>
                    <?php
                    }
                    if(!empty($success)){ ?>
                    <div class="alert alert-success" role="alert">
                        Sukses! Berhasil melakukan registrasi.
                    </div>
                    <?php } 
                ?>
 
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" value="<?php echo $inputs['username']; ?>" placeholder="Username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" value="<?php echo $inputs['email']; ?>" placeholder="youremail@domain.com" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" value="<?php echo $inputs['password']; ?>" placeholder="Password" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</body>
</html>