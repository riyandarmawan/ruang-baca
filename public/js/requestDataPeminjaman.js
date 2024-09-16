function bookFormHandler() {
    return {
        nisn: '',
        nama: '',
        kodeKelas: '',
        books: [{ kode_buku: '', judul: '', penulis: '', penerbit: '', tahun_terbit: '', jumlah: 1 }],

        fetchStudent() {
            fetch(`http://127.0.0.1:8000/api/siswa/${this.nisn}`)
                .then(response => response.ok ? response.json() : response.json().then(errorData => { throw new Error(errorData.pesan); }))
                .then(data => {
                    this.nama = data.nama;
                    this.kodeKelas = data.kode_kelas;
                    this.$nextTick(() => {
                        this.$refs['kode_buku0'].focus(); // Use x-ref to focus on the first kode_buku field
                    });
                })
                .catch(error => {
                    this.nama = '';
                    this.kodeKelas = '';
                    this.$nextTick(() => {
                        this.$refs.nisn.focus(); // Focus on NISN if error occurs
                    });
                    alert(error);
                });
        },

        fetchBookData(index) {
            const book = this.books[index];
            fetch(`http://127.0.0.1:8000/api/buku/${book.kode_buku}`)
                .then(response => response.ok ? response.json() : response.json().then(errorData => { throw new Error(errorData.pesan); }))
                .then(data => {
                    this.books[index].judul = data.judul;
                    this.books[index].penulis = data.penulis;
                    this.books[index].penerbit = data.penerbit;
                    this.books[index].tahun_terbit = data.tahun_terbit;
                    this.$nextTick(() => {
                        this.$refs[`jumlah${index}`].focus(); // Focus on jumlah input after book data is loaded
                    });
                })
                .catch(error => {
                    this.books[index] = { kode_buku: '', judul: '', penulis: '', penerbit: '', tahun_terbit: '', jumlah: 1 };
                    this.$nextTick(() => {
                        this.$refs[`kode_buku${index}`].focus(); // Focus back on kode_buku if error occurs
                    });
                    alert(error);
                });
        },

        addBookRow() {
            const newIndex = this.books.length;
            this.books.push({ kode_buku: '', judul: '', penulis: '', penerbit: '', tahun_terbit: '', jumlah: 1 });
            this.$nextTick(() => {
                this.$refs[`kode_buku${newIndex}`].focus(); // Focus on the new kode_buku field after row is added
            });
        }
    };
}