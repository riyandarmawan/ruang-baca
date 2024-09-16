function bookFormHandler(initialBooks = [], kodeBukuErrors = {}, jumlahErrors = {}) {
    return {
        nisn: '',
        nama: '',
        kodeKelas: '',

        // Initialize books with old data or an empty row
        books: initialBooks.length ? initialBooks : [{ kode_buku: '', judul: '', penulis: '', penerbit: '', tahun_terbit: '', jumlah: 1 }],

        // Add a new row for book input
        addBookRow() {
            this.books.push({ kode_buku: '', judul: '', penulis: '', penerbit: '', tahun_terbit: '', jumlah: 1 });
            this.errors.kode_buku[this.books.length - 1] = '';
            this.errors.jumlah[this.books.length - 1] = '';
        },

        // Fetch student details based on NISN
        fetchStudent() {
            if (!this.nisn) {
                alert('NISN tidak boleh kosong!');
                return;
            }

            fetch(`http://127.0.0.1:8000/api/siswa/${this.nisn}`)
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(errorData => { throw new Error(errorData.pesan); });
                    }
                    return response.json();
                })
                .then(data => {
                    this.nama = data.nama;
                    this.kodeKelas = data.kode_kelas;
                    this.$nextTick(() => {
                        const firstKodeBukuRef = this.$refs['kode_buku0'];
                        if (firstKodeBukuRef) {
                            firstKodeBukuRef.focus(); // Automatically focus on the first book input
                        }
                    });
                })
                .catch(error => {
                    this.nama = '';
                    this.kodeKelas = '';
                    this.$nextTick(() => {
                        const nisnRef = this.$refs.nisn;
                        if (nisnRef) {
                            nisnRef.focus(); // Focus back on NISN input field in case of error
                        }
                    });
                    alert(error.message);
                });
        },

        // Fetch book details based on kode_buku
        fetchBookData(index) {
            const book = this.books[index];

            if (!book.kode_buku) {
                alert('Kode buku tidak boleh kosong!');
                return;
            }

            fetch(`http://127.0.0.1:8000/api/buku/${book.kode_buku}`)
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(errorData => { throw new Error(errorData.pesan); });
                    }
                    return response.json();
                })
                .then(data => {
                    this.books[index].judul = data.judul;
                    this.books[index].penulis = data.penulis;
                    this.books[index].penerbit = data.penerbit;
                    this.books[index].tahun_terbit = data.tahun_terbit;
                    this.$nextTick(() => {
                        const jumlahRef = this.$refs[`jumlah${index}`];
                        if (jumlahRef) {
                            jumlahRef.focus(); // Automatically focus on the jumlah input after fetching book data
                        }
                    });
                })
                .catch(error => {
                    this.books[index] = { kode_buku: '', judul: '', penulis: '', penerbit: '', tahun_terbit: '', jumlah: 1 };
                    this.errors.kode_buku[index] = error.message;
                    this.$nextTick(() => {
                        const kodeBukuRef = this.$refs[`kode_buku${index}`];
                        if (kodeBukuRef) {
                            kodeBukuRef.focus(); // Focus back on the kode_buku field in case of error
                        }
                    });
                });
        },
    };
}
