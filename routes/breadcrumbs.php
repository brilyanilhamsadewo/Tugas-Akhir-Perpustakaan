<?php

// Home
Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
});

// Author Index
Breadcrumbs::for('admin.author.index', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Penulis', route('admin.author.index'));
});

// Author Create
Breadcrumbs::for('admin.author.create', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Penulis', route('admin.author.index'));
    $trail->push('Tambah Penulis', route('admin.author.create'));
});

// Author Edit
Breadcrumbs::for('admin.author.edit', function ($trail, $author) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Penulis', route('admin.author.index'));
    $trail->push('Edit Penulis', route('admin.author.edit', $author));
});

// Author Trash
Breadcrumbs::for('admin.author.trash', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Penulis', route('admin.author.index'));
    $trail->push('Trash Penulis', route('admin.author.trash'));
});

// Category Index
Breadcrumbs::for('admin.category.index', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Kategori', route('admin.category.index'));
});

// Category Create
Breadcrumbs::for('admin.category.create', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Kategori', route('admin.category.index'));
    $trail->push('Tambah Kategori', route('admin.category.create'));
});

// Category Edit
Breadcrumbs::for('admin.category.edit', function ($trail, $category) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Kategori', route('admin.category.index'));
    $trail->push('Edit Kategori', route('admin.category.edit', $category));
});

// Category Trash
Breadcrumbs::for('admin.category.trash', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Kategori', route('admin.category.index'));
    $trail->push('Trash Kategori', route('admin.category.trash'));
});

// Book Index
Breadcrumbs::for('admin.book.index', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Buku', route('admin.book.index'));
});

// Book Create
Breadcrumbs::for('admin.book.create', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Buku', route('admin.book.index'));
    $trail->push('Tambah Buku', route('admin.book.create'));
});

// Book Edit
Breadcrumbs::for('admin.book.edit', function ($trail, $book) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Buku', route('admin.book.index'));
    $trail->push('Edit Buku', route('admin.book.edit', $book));
});

// Book Trash
Breadcrumbs::for('admin.book.trash', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Buku', route('admin.book.index'));
    $trail->push('Trash Buku', route('admin.book.trash'));
});

// Borrow Index
Breadcrumbs::for('admin.borrow.index', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Peminjaman', route('admin.borrow.index'));
});

// Borrow Create
Breadcrumbs::for('admin.borrow.create', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Peminjaman', route('admin.borrow.index'));
    $trail->push('Tambah Peminjaman', route('admin.borrow.create'));
});

// Report Index
Breadcrumbs::for('admin.report.top-book', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
});

// Report Index
Breadcrumbs::for('admin.report.top-user', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
});

// User Index
Breadcrumbs::for('admin.user.index', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('User', route('admin.user.index'));
});

// User Edit
Breadcrumbs::for('admin.user.edit', function ($trail, $user) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('User', route('admin.user.index'));
    $trail->push('Edit User', route('admin.user.edit', $user));
});

// User Create
Breadcrumbs::for('admin.user.create', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('User', route('admin.user.index'));
    $trail->push('Tambah User', route('admin.user.create'));
});

// Book Trash
Breadcrumbs::for('admin.user.trash', function ($trail) {
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('User', route('admin.user.index'));
    $trail->push('Trash User', route('admin.user.trash'));
});